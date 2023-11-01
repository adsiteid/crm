require('dotenv').config();
const mysql = require('mysql-await'); 
const date = require('date-and-time'); 
const moment = require('moment');
const request = require('request');
 
/** funtion untuk send whatsapp array */
function request_leads(nama,sumber,project,receive){
    var options = {
        url: 'https://app.whacenter.com/api/send', 
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        form: {
            'device_id': '05270e349d62ad8abad1624af7bf3ce2',
            'number': receive,
            'message': 'New Leads\n\n*New Lead*\n\n*Nama* : '+ nama +'\n*Sumber* : '+ sumber +'\n*Project* : '+ project +'\n\n*Note* Nomor kontak hanya ada di CRM silahkan di follow up. Terima kasih'
        }
    };
    
    request(options, function (error, response) {
        if (error) throw new Error(error);
        console.log(response.body);
    });
}
/** funtion untuk recycle array */
Array.prototype.cycle = function(str) {
    const i = this.indexOf(str);
    if (i === -1) return undefined;
    return this[(i + 1) % this.length];
};    
/** Create connection pool using loaded config */
const connection = mysql.createConnection({
    "connectionLimit" : 10,
    "host": process.env.DB_HOST,
    "user": process.env.DB_USER,
    "password": process.env.DB_PASS,
    "database": process.env.DB_DATABASE,
    "throwErrors"     : false 
}); 

async function  rollingleads() { 
    const query1 = "SELECT *,(SELECT project FROM project WHERE id=leads.project) AS project_name FROM leads where update_status='new' and rolling_leads=1";
    let leads = await connection.awaitQuery(query1);  
    leads.forEach(async element => { 
        var dateleads = moment(element["rolling_lasttime"], 'YYYY-MM-DD HH:mm:ss').add(element["rolling_interval"], 'minutes');
        var datenow = moment();

        var ms = dateleads.diff(datenow);  
        console.log(element["id"]); 
        console.log(element["sales"]); 
        console.log(moment.utc(ms).format("mm:ss"));  
        if(ms < 0) { 
            const query2 = "SELECT * FROM groups_sales where groups='" + element["groups"] +  "' and project='" + element["project"] +  "' and level='sales'";
            let users = await connection.awaitQuery(query2);  
            let user = [];
            users.forEach(el => {user.push(el["id_user"]); }); 
            console.log(user); 
            let id_user = user.cycle(element["sales"]);

            const query4 = "SELECT * FROM users where id='" + id_user +  "'";
            let usersdetail = await connection.awaitQuery(query4);
            let contact = "0895352992663"; //default
            usersdetail.forEach(el => {contact = el["contact"]; });

            const query3 = "update leads set sales='" + id_user + "', rolling_lasttime='" + moment().format("YYYY-MM-DD HH:mm:ss") + "' where id='" + element["id"] +"'";
            await connection.awaitQuery(query3);  

            // request_leads(element["nama_leads"],
            //     element["sumber_leads"],
            //     element["project_name"],
            //     contact);
        }
    });
}


setInterval(() => {
    rollingleads();
}, 1000) 
