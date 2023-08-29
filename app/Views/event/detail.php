<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<style>
    #calendar {
        width: 100%;
    }

    .fc .fc-event.fc-not-start,
    .fc .fc-event.fc-not-end {
        background: #1f3960;
        border-left: 4px solid #1f3960;
        padding-left: 0.5rem;
    }

    element.style {
        overflow: visible !important;
        height: 100% !important;
    }

    div.fc-scroller.fc-day-grid-container {
        overflow: visible !important;
        height: 100% !important;
    }

    .fc-toolbar h2 {
        font-size: 18px !important;
        margin: 0;
    }

    .fc-button .fc-icon {
        vertical-align: middle;
        font-size: 1rem !important;
    }


    .fc-today-button {
        display: none !important;
    }

    .fc-button-primary:hover {
        color: #fff;
        background-color: #1f3960;
        border-color: #1f3960 !important;
    }
</style>


<link rel="stylesheet" type="text/css" href="https://fullcalendar.io/releases/core/4.1.0/main.min.css">


<?php foreach ($event->getResultArray() as $row); ?>

<div class="row">
    <div class="col-lg-4 col-12 mb-3 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body">
                <div class="col-12">
                    <img src="<?= base_url(); ?>/document/image/event/<?= (!$row['image']) ? 'upload.jpg' : $row['image']; ?>" class="w-100 mt-3">
                    <!-- <button class="btn btn-primary w-100 my-3">Download</button> -->


                    <div class="mt-5">

                        <h4 clas="mb-5">Detail Event</h4>
                        <p style="font-size:12px;" class="mt-4 mb-1 text-muted">Event</p>
                        <h6 style="font-size:12px;" class="mb-3 "><?= $row['event_name']; ?></h6>
                        <p style="font-size:12px;" class="mb-1 text-muted">Project</p>
                        <h6 style="font-size:12px;" class="mb-3 "><?php foreach ($project->detail($row['project'])->getResultarray() as $prj) {
                                                                        echo $prj['project'];
                                                                    } ?></h6>
                        <p style="font-size:12px;" class="mb-1 text-muted">Address</p>
                        <h6 style="font-size:12px;" class="mb-3"><?= $row['full_address']; ?></h6>
                        <p style="font-size:12px;" class="mb-1 text-muted">Contact / PIC</p>
                        <h6 style="font-size:12px;" class="mb-3"><?= $row['contact']; ?></h6>
                        <p style="font-size:12px;" class="mb-1 text-muted">Email / PIC</p>
                        <h6 style="font-size:12px;" class="mb-3"><?= $row['email']; ?></h6>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-8 col-12 mb-3 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-header bg-transparent py-3">
                <h6 class="mt-2"><?= $row['event_name'] ?> - <?php foreach ($project->detail($row['project'])->getResultarray() as $prj) {
                                                                    echo $prj['project'];
                                                                } ?></h6>
            </div>
            <div class="card-body">
                <div class="row d-flex">

                    <div class="col-12 mb-lg-0 mb-4">

                        <div id='calendar'></div>


                    </div>
                    <!-- <div class="col-lg-4 pt-2">
                        <p style="font-size:12px;" class="mb-1 text-muted">Project</p>
                        <h6 style="font-size:12px;" class="mb-3 "><?= $row['project']; ?></h6>
                        <p style="font-size:12px;" class="mb-1 text-muted">Subholding</p>
                        <h6 style="font-size:12px;" class="mb-3"><?= $row['subholding']; ?></h6>
                        <p style="font-size:12px;" class="mb-1 text-muted">Address</p>
                        <h6 style="font-size:12px;" class="mb-3"><?= $row['full_address']; ?></h6>
                        <p style="font-size:12px;" class="mb-1 text-muted">Contact / PIC</p>
                        <h6 style="font-size:12px;" class="mb-3"><?= $row['contact']; ?></h6>
                        <p style="font-size:12px;" class="mb-1 text-muted">Email / PIC</p>
                        <h6 style="font-size:12px;" class="mb-3"><?= $row['email']; ?></h6>
                    </div> -->
                </div>

                <div class="col p-0 mt-4 ">
                    <label for="">Description</label>
                    <textarea class="w-100 border-secondary rounded p-3 bg-light small" rows="8"><?= $row['description']; ?></textarea>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end my-4 row px-3">

    <a type="button" class="btn btn-outline-primary col-lg-2 col-6" data-toggle="modal" data-target="#delete-data">Delete</a>
    <a href="<?= base_url('/edit_event/' . $row['id']) ?>" class="btn btn-primary col-lg-2 col-6">Edit</a>

</div>


<!-- delete Modal-->

<div class="modal fade" id="delete-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">Are you sure want to delete this data?</div>
            <div class="modal-footer ">
                <div class="row d-flex col-12 px-0 py-2">
                    <div class="col-6">
                        <button class="btn btn-secondary w-100" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                    <div class="col-6">
                        <form action="<?= base_url(); ?>delete_event/<?= $row['id']; ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-primary w-100"> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://fullcalendar.io/releases/core/4.1.0/main.min.js"></script>
<script src="https://fullcalendar.io/releases/daygrid/4.1.0/main.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['dayGrid'],
            eventClick: function(info) {
                var eventObj = info.event;

                if (eventObj.url) {
                    alert(
                        'Clicked ' + eventObj.title + '.\n' +
                        'Will open ' + eventObj.url + ' in a new tab'
                    );

                    window.open(eventObj.url);

                    info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
                } else {
                    alert('Event : ' + eventObj.title);
                }
            },
            defaultDate: "<?= $row['date_start']; ?>",
            events: [



                {
                    <?php $date = $row['date_end']; ?>
                    title: "<?= $row['event_name']; ?>",
                    start: "<?= $row['date_start']; ?>",
                    end: "<?php echo date('Y-m-d', strtotime($date . ' +1 day')); ?>"
                },
            ]
        });


        calendar.render();
    });
</script>




<?php $this->endSection(); ?>