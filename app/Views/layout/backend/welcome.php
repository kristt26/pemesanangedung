<!DOCTYPE html>
<html lang="en" ng-app="apps" ng-controller="indexController">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{titleHeader}}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../assets/backend/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/backend/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../assets/backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet"
        href="../assets/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../assets/backend/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/backend/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="../assets/backend/plugins/bs-stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="../assets/backend/plugins/dropzone/min/dropzone.min.css">
    <link rel="stylesheet" href="../assets/backend/dist/css/adminlte.css">
    <link rel="stylesheet" href="../assets/backend/dist/css/bootstrap-image-checkbox.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?=$sidebar?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?=$title['title']?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?=base_url("admin/home")?>">Home</a></li>
                                <li class="breadcrumb-item active"><?=$title['title']?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <?=$content?>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <!-- <b>Version</b> 3.1.0 -->
            </div>
            <strong>Octagon Cendrawasih Slutiono <a href="https://adminlte.io">OCS</a>.</strong>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    <script src="../assets/backend/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/backend/plugins/select2/js/select2.full.min.js"></script>
    <script src="../assets/backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="../assets/backend/plugins/moment/moment.min.js"></script>
    <script src="../assets/backend/plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="../assets/backend/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../assets/backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="../assets/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../assets/backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="../assets/backend/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <script src="../assets/backend/plugins/dropzone/min/dropzone.min.js"></script>
    <script src="../assets/backend/dist/js/adminlte.min.js"></script>
    <script src="../assets/backend/dist/js/demo.js"></script>


    <script src="../assets/backend/dist/js/angular/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.8.2/angular-sanitize.min.js"
        integrity="sha512-JkCv2gG5E746DSy2JQlYUJUcw9mT0vyre2KxE2ZuDjNfqG90Bi7GhcHUjLQ2VIAF1QVsY5JMwA1+bjjU5Omabw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../assets/backend/js/apps.js"></script>
    <script src="../assets/backend/js/services/helper.services.js"></script>
    <script src="../assets/backend/js/services/auth.services.js"></script>
    <script src="../assets/backend/js/services/admin.services.js"></script>
    <script src="../assets/backend/js/services/message.services.js"></script>
    <script src="../assets/backend/js/controllers/admin.controllers.js"></script>
    <script src="../assets/backend/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../assets/backend/libs/swangular/swangular.js"></script>
    <script src="../assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/backend/libs/angular-datatables/dist/angular-datatables.min.js"></script>
    <script src="../assets/backend/libs/angular-locale_id-id.js"></script>
    <script src="../assets/backend/libs/input-mask/angular-input-masks-standalone.min.js"></script>
    <script src="../assets/backend/libs/jquery.PrintArea.js"></script>
    <script src="../assets/backend/libs/angular-base64-upload/dist/angular-base64-upload.min.js"></script>
    <script src="../assets/backend/libs/loading/dist/loadingoverlay.min.js"></script>
    <script src="../assets/backend/libs/calendar/main.min.js"></script>
    <script src="../assets/backend/libs/calendar/locales-all.min.js"></script>
    <script src="../assets/backend/libs/angularjs-currency-input-mask/dist/angularjs-currency-input-mask.min.js">
    </script>
    <script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'YYYY-MM-DD'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
    // BS-Stepper Init
    </script>
</body>

</html>