<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no"/>

        <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">

        <title>vishleShan - Sentimental Analysis</title>

        <!-- additional styles for plugins -->
        <!-- weather icons -->
        <link rel="stylesheet" href="bower_components/weather-icons/css/weather-icons.min.css" media="all">
        <!-- metrics graphics (charts) -->
        <link rel="stylesheet" href="bower_components/metrics-graphics/dist/metricsgraphics.css">
        <!-- chartist -->
        <link rel="stylesheet" href="bower_components/chartist/dist/chartist.min.css">

        <!-- uikit -->
        <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

        <!-- flag icons -->
        <link rel="stylesheet" href="assets/icons/flags/flags.min.css" media="all">

        <!-- altair admin -->
        <link rel="stylesheet" href="assets/css/main.min.css" media="all">

        <!-- matchMedia polyfill for testing media queries in JS -->
        <!--[if lte IE 9]>
            <script type="text/javascript" src="bower_components/matchMedia/matchMedia.js"></script>
            <script type="text/javascript" src="bower_components/matchMedia/matchMedia.addListener.js"></script>
        <![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                //alert("Hello");
                $("#testnox").on('change', function () {
                    //alert("Change detected!");
                    var jobValue = document.getElementById('testnox').value;
                    //alert(jobValue);
                    function getAge(birth) {
                        var today = new Date();
                        var curr_date = today.getDate();
                        var curr_month = today.getMonth() + 1;
                        var curr_year = today.getFullYear();

                        var pieces = birth.split('.');
                        var birth_date = pieces[0];
                        var birth_month = pieces[1];
                        var birth_year = pieces[2];

                        if (curr_month == birth_month && curr_date >= birth_date)
                            return parseInt(curr_year - birth_year);
                        if (curr_month == birth_month && curr_date < birth_date)
                            return parseInt(curr_year - birth_year - 1);
                        if (curr_month > birth_month)
                            return parseInt(curr_year - birth_year);
                        if (curr_month < birth_month)
                            return parseInt(curr_year - birth_year - 1);
                    }

                    var age = getAge(jobValue);
                    //alert(age);
                    input_counter.value=age;
                });

            });
        </script>

    </head>
    <body class=" sidebar_main_open sidebar_main_swipe">       

        <div id="page_content">
            <div class="uk-width-medium-1-2">
                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_a">Datepicker</h3>
                        <div class="uk-grid">
                            <div class="uk-width-large-2-3 uk-width-1-1">
                                <div class="uk-input-group">
                                    <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                    <label for="uk_dp_1">Select date</label>
                                    <input class="md-input change" type="text" id="testnox" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_a">Character Counter</h3>
                        <div class="uk-width-large-2-3 uk-width-1-1">
                            
                            <input type="text" class="input-count md-input" id="input_counter" maxlength="60" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- secondary sidebar -->
        <?php include 'include/sideop.php'; ?>
        <?php include 'include/footer.php'; ?>
        <!-- secondary sidebar end -->


        <!-- common functions -->
        <script src="assets/js/common.min.js"></script>
        <!-- uikit functions -->
        <script src="assets/js/uikit_custom.min.js"></script>
        <!-- altair common functions/helpers -->
        <script src="assets/js/altair_admin_common.min.js"></script>
        <!-- ionrangeslider -->
        <script src="bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
        <!-- htmleditor (codeMirror) -->
        <script src="assets/js/uikit_htmleditor_custom.min.js"></script>
        <!-- inputmask-->
        <script src="bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>

        <!--  forms advanced functions -->
        <script src="assets/js/pages/forms_advanced.min.js"></script>


        <script>
            $(function () {
                // enable hires images
                altair_helpers.retina_images();
                // fastClick (touch devices)
                if (Modernizr.touch) {
                    FastClick.attach(document.body);
                }
            });
        </script>
    </body>
</html>
