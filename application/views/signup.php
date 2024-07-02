<?php include("application/views/header_view.php"); ?>

<br><br><br><br>
<!-- <section class="innerbanner ">
</section> -->


<main class="align-self-center">
    <!-- <section class="bg-con"> -->

    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12">
                <div class="row mb-5">
                    <div class="col-lg-6">
                        <img src="<?php echo base_url('images/signup-img.jpg'); ?>" alt="" class="img-fluid d-block mx-auto">

                    </div>
                    <div class="col-lg-6">
                        <div class="alert alert-success alert-dismissible fade show" id="successAlert" style="
                                top: 0;
                                right: 60px;
                                position: relative;
                                display: none;
                                " role="alert">
                            <!-- <strong>Congratulations!</strong>Your registration was successful. You can now sign in.. -->
                            <button type="button" class="btn-close"></button>
                        </div>
                        <div class="contactpage-form shadow rounded">

                            <h2 class="mb-0" style="color: #1D4E66;">Register</h2>
                            <span class="d-block fs-6 mb-4">Register for an account to get a notification</span>

                            <?= form_open('home/Signupdata', array('class' => 'row g-3', 'onsubmit' => 'return validateForm()')); ?>

                            <?php
                            $success_message = $this->session->flashdata('success_message');
                            $error_message = $this->session->flashdata('error_message');

                            if (!empty($success_message)) {
                                echo '<div class="alert alert-success">' . $success_message . '</div>';
                            } elseif (!empty($error_message)) {
                                echo '<div class="alert alert-danger">' . $error_message . '</div>';
                            }
                            ?>

                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                            <script>
                                $(document).ready(function() {
                                    setTimeout(function() {
                                        $('.alert').fadeOut('slow');
                                    }, 100000);
                                });
                            </script>

                            <!-- <div class="col-lg-12 position-relative">
                                        <label for="validationDefault03" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="validationDefault01" value="" required
                                            onkeydown="return /^[A-Za-z\s]+$/i.test(event.key)" />
                                        <span id="nameError" class="text-danger" style="display: none">Please enter valid name</span>
                                    </div>
                                    <div class="col-lg-12 position-relative">
                                        <label for="validationDefault03" class="form-label">Mobile Number</label>
                                        <input type="tel" class="form-control" name="number" id="validationDefault02" value="" required
                                            />
                                        <span id="phoneError" class="text-danger" style="display: none">Please enter valid phone number</span>
                                    </div> -->

                            <div class="col-lg-6 position-relative">
                                <label for="validationDefault01" class="form-label">Name<span style="color: red;">*</span></label>
                                <?= form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'name', 'id' => 'validationDefault01', 'value' => '', 'required' => 'required', 'oninput' => 'validateName(this)')); ?>
                                <span id="nameError" class="text-danger" style="display: none">
                                    Please enter a valid name (up to 50 characters).
                                </span>
                            </div>

                            <script>
                                function validateName(input) {
                                    var regex = /^[A-Za-z\s]+$/;
                                    var isValid = regex.test(input.value);
                                    var maxCharacters = 50;

                                    var errorSpan = document.getElementById("nameError");

                                    if (input.value.length > maxCharacters) {
                                        errorSpan.textContent = "Name should not exceed " + maxCharacters + " characters.";
                                        errorSpan.style.display = "block";
                                    } else if (isValid || input.value.trim() === "") {
                                        errorSpan.style.display = "none";
                                    } else {
                                        errorSpan.textContent = "Please enter a valid name.";
                                        errorSpan.style.display = "block";
                                    }
                                }
                            </script>




                            <div class="col-lg-6 position-relative">
                                <label for="validationDefault03" class="form-label">Email<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="email" id="validationDefault03" value="" required="" oninput="validateEmail(this)">
                                <span id="emailError" class="text-danger" style="display: none">Please enter a valid email</span>
                            </div>

                            <script>
                                function validateEmail(input) {
                                    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                    var isValid = regex.test(input.value);

                                    var errorSpan = document.getElementById("emailError");

                                    if (isValid || input.value.trim() === "") {
                                        errorSpan.style.display = "none";
                                    } else {
                                        errorSpan.style.display = "block";
                                    }
                                }
                            </script>

                            <div class="col-lg-6 position-relative">
                                <label for="validationDefault01" class="form-label">City<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="city" id="validationDefault01" value="" required="" oninput="validateCity(this)">
                                <span id="cityError" class="text-danger" style="display: none">
                                    Please enter a valid city.
                                </span>
                            </div>

                            <script>
                                function validateCity(input) {
                                    var regex = /^[A-Za-z\s]+$/;
                                    var isValid = regex.test(input.value);
                                    var maxCharacters = 50;

                                    var errorSpan = document.getElementById("cityError");

                                    if (input.value.length > maxCharacters) {
                                        errorSpan.textContent = "City should not exceed " + maxCharacters + " characters.";
                                        errorSpan.style.display = "block";
                                    } else if (isValid || input.value.trim() === "") {
                                        errorSpan.style.display = "none";
                                    } else {
                                        errorSpan.textContent = "Please enter a valid city.";
                                        errorSpan.style.display = "block";
                                    }
                                }
                            </script>

                            <div class="col-lg-6 position-relative">
                                <label for="validationDefault02" class="form-label">Mobile Number<span style="color: red;">*</span></label>
                                <div style="display: flex;">
                                    <select style="width: 122px; margin-right: 10px;" class="form-control" name="country-code" id="countryCodeSelect">
                                        <option name="afg" value="(+93)">AFG(+93)</option>
                                        <option name="ala" value="(+358)">ALA(+358)</option>
                                        <option name="alb" value="(+355)">ALB(+355)</option>
                                        <option name="dza" value="(+213)">DZA(+213)</option>
                                        <option name="asm" value="(+1-684)">ASM(+1-684)</option>
                                        <option name="and" value="(+376)">AND(+376)</option>
                                        <option name="ago" value="(+244)">AGO(+244)</option>
                                        <option name="aia" value="(+1-264)">AIA(+1-264)</option>
                                        <option name="atg" value="(+1-268)">ATG(+1-268)</option>
                                        <option name="arg" value="(+54)">ARG(+54)</option>
                                        <option name="arm" value="(+374)">ARM(+374)</option>
                                        <option name="abw" value="(+297)">ABW(+297)</option>
                                        <option name="aus" value="(+61)">AUS(+61)</option>
                                        <option name="aut" value="(+43)">AUT(+43)</option>
                                        <option name="aze" value="(+994)">AZE(+994)</option>
                                        <option name="bhs" value="(+1-242)">BHS(+1-242)</option>
                                        <option name="bhr" value="(+973)">BHR(+973)</option>
                                        <option name="bgd" value="(+880)">BGD(+880)</option>
                                        <option name="brb" value="(+1-246)">BRB(+1-246)</option>
                                        <option name="blr" value="(+375)">BLR(+375)</option>
                                        <option name="bel" value="(+32)">BEL(+32)</option>
                                        <option name="blz" value="(+501)">BLZ(+501)</option>
                                        <option name="ben" value="(+229)">BEN(+229)</option>
                                        <option name="bmu" value="(+1-441)">BMU(+1-441)</option>
                                        <option name="btn" value="(+975)">BTN(+975)</option>
                                        <option name="bol" value="(+591)">BOL(+591)</option>
                                        <option name="bih" value="(+387)">BIH(+387)</option>
                                        <option name="bwa" value="(+267)">BWA(+267)</option>
                                        <option name="bra" value="(+55)">BRA(+55)</option>
                                        <option name="iot" value="(+246)">IOT(+246)</option>
                                        <option name="brn" value="(+673)">BRN(+673)</option>
                                        <option name="bgr" value="(+359)">BGR(+359)</option>
                                        <option name="bfa" value="(+226)">BFA(+226)</option>
                                        <option name="bdi" value="(+257)">BDI(+257)</option>
                                        <option name="khm" value="(+855)">KHM(+855)</option>
                                        <option name="cmr" value="(+237)">CMR(+237)</option>
                                        <option name="can" value="(+1)">CAN(+1)</option>
                                        <option name="cpv" value="(+238)">CPV(+238)</option>
                                        <option name="cym" value="(+1-345)">CYM(+1-345)</option>
                                        <option name="caf" value="(+236)">CAF(+236)</option>
                                        <option name="tcd" value="(+235)">TCD(+235)</option>
                                        <option name="chl" value="(+56)">CHL(+56)</option>
                                        <option name="chn" value="(+86)">CHN(+86)</option>
                                        <option name="cxr" value="(+61)">CXR(+61)</option>
                                        <option name="cck" value="(+61)">CCK(+61)</option>
                                        <option name="col" value="(+57)">COL(+57)</option>
                                        <option name="com" value="(+269)">COM(+269)</option>
                                        <option name="cog" value="(+242)">COG(+242)</option>
                                        <option name="cod" value="(+243)">COD(+243)</option>
                                        <option name="cok" value="(+682)">COK(+682)</option>
                                        <option name="cri" value="(+506)">CRI(+506)</option>
                                        <option name="hrv" value="(+385)">HRV(+385)</option>
                                        <option name="cub" value="(+53)">CUB(+53)</option>
                                        <option name="cuw" value="(+599)">CUW(+599)</option>
                                        <option name="cyp" value="(+357)">CYP(+357)</option>
                                        <option name="cze" value="(+420)">CZE(+420)</option>
                                        <option name="dnk" value="(+45)">DNK(+45)</option>
                                        <option name="dji" value="(+253)">DJI(+253)</option>
                                        <option name="dma" value="(+1-767)">DMA(+1-767)</option>
                                        <option name="dom" value="(+1-809)">DOM(+1-809)</option>
                                        <option name="ecu" value="(+593)">ECU(+593)</option>
                                        <option name="egy" value="(+20)">EGY(+20)</option>
                                        <option name="slv" value="(+503)">SLV(+503)</option>
                                        <option name="gnq" value="(+240)">GNQ(+240)</option>
                                        <option name="eri" value="(+291)">ERI(+291)</option>
                                        <option name="est" value="(+372)">EST(+372)</option>
                                        <option name="eth" value="(+251)">ETH(+251)</option>
                                        <option name="flk" value="(+500)">FLK(+500)</option>
                                        <option name="fro" value="(+298)">FRO(+298)</option>
                                        <option name="fji" value="(+679)">FJI(+679)</option>
                                        <option name="fin" value="(+358)">FIN(+358)</option>
                                        <option name="fra" value="(+33)">FRA(+33)</option>
                                        <option name="guf" value="(+594)">GUF(+594)</option>
                                        <option name="pyf" value="(+689)">PYF(+689)</option>
                                        <option name="atf" value="(+262)">ATF(+262)</option>
                                        <option name="gab" value="(+241)">GAB(+241)</option>
                                        <option name="gmb" value="(+220)">GMB(+220)</option>
                                        <option name="geo" value="(+995)">GEO(+995)</option>
                                        <option name="deu" value="(+49)">DEU(+49)</option>
                                        <option name="gha" value="(+233)">GHA(+233)</option>
                                        <option name="gib" value="(+350)">GIB(+350)</option>
                                        <option name="grc" value="(+30)">GRC(+30)</option>
                                        <option name="grl" value="(+299)">GRL(+299)</option>
                                        <option name="grd" value="(+1-473)">GRD(+1-473)</option>
                                        <option name="glp" value="(+590)">GLP(+590)</option>
                                        <option name="gum" value="(+1-671)">GUM(+1-671)</option>
                                        <option name="gtm" value="(+502)">GTM(+502)</option>
                                        <option name="ggy" value="(+44)">GGY(+44)</option>
                                        <option name="gin" value="(+224)">GIN(+224)</option>
                                        <option name="gnb" value="(+245)">GNB(+245)</option>
                                        <option name="guy" value="(+592)">GUY(+592)</option>
                                        <option name="hti" value="(+509)">HTI(+509)</option>
                                        <option name="hmd" value="(+672)">HMD(+672)</option>
                                        <option name="vat" value="(+39)">VAT(+39)</option>
                                        <option name="hnd" value="(+504)">HND(+504)</option>
                                        <option name="hkg" value="(+852)">HKG(+852)</option>
                                        <option name="hun" value="(+36)">HUN(+36)</option>
                                        <option name="isl" value="(+354)">ISL(+354)</option>
                                        <option name="ind" value="(+91)">IND(+91)</option>
                                        <option name="idn" value="(+62)">IDN(+62)</option>
                                        <option name="civ" value="(+225)">CIV(+225)</option>
                                        <option name="irn" value="(+98)">IRN(+98)</option>
                                        <option name="irq" value="(+964)">IRQ(+964)</option>
                                        <option name="irl" value="(+353)">IRL(+353)</option>
                                        <option name="imn" value="(+44)">IMN(+44)</option>
                                        <option name="isr" value="(+972)">ISR(+972)</option>
                                        <option name="ita" value="(+39)">ITA(+39)</option>
                                        <option name="jam" value="(+1-876)">JAM(+1-876)</option>
                                        <option name="jpn" value="(+81)">JPN(+81)</option>
                                        <option name="jey" value="(+44)">JEY(+44)</option>
                                        <option name="jor" value="(+962)">JOR(+962)</option>
                                        <option name="kaz" value="(+7)">KAZ(+7)</option>
                                        <option name="ken" value="(+254)">KEN(+254)</option>
                                        <option name="kir" value="(+686)">KIR(+686)</option>
                                        <option name="prk" value="(+850)">PRK(+850)</option>
                                        <option name="kor" value="(+82)">KOR(+82)</option>
                                        <option name="kwt" value="(+965)">KWT(+965)</option>
                                        <option name="kgz" value="(+996)">KGZ(+996)</option>
                                        <option name="lao" value="(+856)">LAO(+856)</option>
                                        <option name="lva" value="(+371)">LVA(+371)</option>
                                        <option name="lbn" value="(+961)">LBN(+961)</option>
                                        <option name="lso" value="(+266)">LSO(+266)</option>
                                        <option name="lbr" value="(+231)">LBR(+231)</option>
                                        <option name="lby" value="(+218)">LBY(+218)</option>
                                        <option name="lie" value="(+423)">LIE(+423)</option>
                                        <option name="ltu" value="(+370)">LTU(+370)</option>
                                        <option name="lux" value="(+352)">LUX(+352)</option>
                                        <option name="mac" value="(+853)">MAC(+853)</option>
                                        <option name="mkd" value="(+389)">MKD(+389)</option>
                                        <option name="mdg" value="(+261)">MDG(+261)</option>
                                        <option name="mwi" value="(+265)">MWI(+265)</option>
                                        <option name="mys" value="(+60)">MYS(+60)</option>
                                        <option name="mdv" value="(+960)">MDV(+960)</option>
                                        <option name="mli" value="(+223)">MLI(+223)</option>
                                        <option name="mlt" value="(+356)">MLT(+356)</option>
                                        <option name="mhl" value="(+692)">MHL(+692)</option>
                                        <option name="mtq" value="(+596)">MTQ(+596)</option>
                                        <option name="mrt" value="(+222)">MRT(+222)</option>
                                        <option name="mus" value="(+230)">MUS(+230)</option>
                                        <option name="myt" value="(+262)">MYT(+262)</option>
                                        <option name="mex" value="(+52)">MEX(+52)</option>
                                        <option name="fsm" value="(+691)">FSM(+691)</option>
                                        <option name="mda" value="(+373)">MDA(+373)</option>
                                        <option name="mco" value="(+377)">MCO(+377)</option>
                                        <option name="mn" value="(+976)">MN(+976)</option>
                                        <option name="mne" value="(+382)">MNE(+382)</option>
                                        <option name="msr" value="(+1-664)">MSR(+1-664)</option>
                                        <option name="mar" value="(+212)">MAR(+212)</option>
                                        <option name="moz" value="(+258)">MOZ(+258)</option>
                                        <option name="mmr" value="(+95)">MMR(+95)</option>
                                        <option name="nam" value="(+264)">NAM(+264)</option>
                                        <option name="nru" value="(+674)">NRU(+674)</option>
                                        <option name="npl" value="(+977)">NPL(+977)</option>
                                        <option name="nld" value="(+31)">NLD(+31)</option>
                                        <option name="ncl" value="(+687)">NCL(+687)</option>
                                        <option name="nzl" value="(+64)">NZL(+64)</option>
                                        <option name="nic" value="(+505)">NIC(+505)</option>
                                        <option name="ner" value="(+227)">NER(+227)</option>
                                        <option name="nga" value="(+234)">NGA(+234)</option>
                                        <option name="niu" value="(+683)">NIU(+683)</option>
                                        <option name="nfk" value="(+672)">NFK(+672)</option>
                                        <option name="mnp" value="(+1-670)">MNP(+1-670)</option>
                                        <option name="nor" value="(+47)">NOR(+47)</option>
                                        <option name="omn" value="(+968)">OMN(+968)</option>
                                        <option name="pak" value="(+92)">PAK(+92)</option>
                                        <option name="plw" value="(+680)">PLW(+680)</option>
                                        <option name="pse" value="(+970)">PSE(+970)</option>
                                        <option name="pan" value="(+507)">PAN(+507)</option>
                                        <option name="png" value="(+675)">PNG(+675)</option>
                                        <option name="pry" value="(+595)">PRY(+595)</option>
                                        <option name="per" value="(+51)">PER(+51)</option>
                                        <option name="phl" value="(+63)">PHL(+63)</option>
                                        <option name="pcn" value="(+64)">PCN(+64)</option>
                                        <option name="pol" value="(+48)">POL(+48)</option>
                                        <option name="prt" value="(+351)">PRT(+351)</option>
                                        <option name="pri" value="(+1-787)">PRI(+1-787)</option>
                                        <option name="qat" value="(+974)">QAT(+974)</option>
                                        <option name="reu" value="(+262)">REU(+262)</option>
                                        <option name="rou" value="(+40)">ROU(+40)</option>
                                        <option name="rus" value="(+7)">RUS(+7)</option>
                                        <option name="rwa" value="(+250)">RWA(+250)</option>
                                        <option name="blm" value="(+590)">BLM(+590)</option>
                                        <option name="shn" value="(+290)">SHN(+290)</option>
                                        <option name="kna" value="(+1-869)">KNA(+1-869)</option>
                                        <option name="lca" value="(+1-758)">LCA(+1-758)</option>
                                        <option name="maf" value="(+590)">MAF(+590)</option>
                                        <option name="spm" value="(+508)">SPM(+508)</option>
                                        <option name="vct" value="(+1-784)">VCT(+1-784)</option>
                                        <option name="wsm" value="(+685)">WSM(+685)</option>
                                        <option name="smr" value="(+378)">SMR(+378)</option>
                                        <option name="stp" value="(+239)">STP(+239)</option>
                                        <option name="sau" value="(+966)">SAU(+966)</option>
                                        <option name="sen" value="(+221)">SEN(+221)</option>
                                        <option name="srb" value="(+381)">SRB(+381)</option>
                                        <option name="syc" value="(+248)">SYC(+248)</option>
                                        <option name="sle" value="(+232)">SLE(+232)</option>
                                        <option name="sgp" value="(+65)">SGP(+65)</option>
                                        <option name="sxm" value="(+1-721)">SXM(+1-721)</option>
                                        <option name="svk" value="(+421)">SVK(+421)</option>
                                        <option name="svn" value="(+386)">SVN(+386)</option>
                                        <option name="slb" value="(+677)">SLB(+677)</option>
                                        <option name="som" value="(+252)">SOM(+252)</option>
                                        <option name="zaf" value="(+27)">ZAF(+27)</option>
                                        <option name="sgs" value="(+500)">SGS(+500)</option>
                                        <option name="ssd" value="(+211)">SSD(+211)</option>
                                        <option name="esp" value="(+34)">ESP(+34)</option>
                                        <option name="lka" value="(+94)">LKA(+94)</option>
                                        <option name="sdn" value="(+249)">SDN(+249)</option>
                                        <option name="sur" value="(+597)">SUR(+597)</option>
                                        <option name="sjm" value="(+47)">SJM(+47)</option>
                                        <option name="swz" value="(+268)">SWZ(+268)</option>
                                        <option name="swe" value="(+46)">SWE(+46)</option>
                                        <option name="che" value="(+41)">CHE(+41)</option>
                                        <option name="syr" value="(+963)">SYR(+963)</option>
                                        <option name="twn" value="(+886)">TWN(+886)</option>
                                        <option name="tjk" value="(+992)">TJK(+992)</option>
                                        <option name="tza" value="(+255)">TZA(+255)</option>
                                        <option name="tha" value="(+66)">THA(+66)</option>
                                        <option name="tls" value="(+670)">TLS(+670)</option>
                                        <option name="tgo" value="(+228)">TGO(+228)</option>
                                        <option name="tkl" value="(+690)">TKL(+690)</option>
                                        <option name="ton" value="(+676)">TON(+676)</option>
                                        <option name="tto" value="(+1-868)">TTO(+1-868)</option>
                                        <option name="tun" value="(+216)">TUN(+216)</option>
                                        <option name="tur" value="(+90)">TUR(+90)</option>
                                        <option name="tkm" value="(+993)">TKM(+993)</option>
                                        <option name="tca" value="(+1-649)">TCA(+1-649)</option>
                                        <option name="tuv" value="(+688)">TUV(+688)</option>
                                        <option name="uga" value="(+256)">UGA(+256)</option>
                                        <option name="ukr" value="(+380)">UKR(+380)</option>
                                        <option name="are" value="(+971)">ARE(+971)</option>
                                        <option name="gbr" value="(+44)">GBR(+44)</option>
                                        <option name="usa" value="(+1)">USA(+1)</option>
                                        <option name="ury" value="(+598)">URY(+598)</option>
                                        <option name="uzb" value="(+998)">UZB(+998)</option>
                                        <option name="vut" value="(+678)">VUT(+678)</option>
                                        <option name="ven" value="(+58)">VEN(+58)</option>
                                        <option name="vnm" value="(+84)">VNM(+84)</option>
                                        <option name="vgb" value="(+1-284)">VGB(+1-284)</option>
                                        <option name="vir" value="(+1-340)">VIR(+1-340)</option>
                                        <option name="wlf" value="(+681)">WLF(+681)</option>
                                        <option name="esh" value="(+212)">ESH(+212)</option>
                                        <option name="yem" value="(+967)">YEM(+967)</option>
                                        <option name="zmb" value="(+260)">ZMB(+260)</option>
                                        <option name="zwe" value="(+263)">ZWE(+263)</option>
                                    </select>
                                    <input type="tel" class="form-control" name="number" id="validationDefault02" value="" required="" oninput="validatePhoneNumber(this)" onblur="clearError('phoneError')">
                                </div>
                                <span id="phoneError" class="text-danger" style="display: none">Please enter a valid mobile number (10 digits)</span>
                            </div>


                            <script>
                                function validatePhoneNumber(input) {
                                    input.value = input.value.replace(/\D/g, '').slice(0, 10);

                                    var isValid = true;

                                    var selectedCountryCode = document.getElementById('countryCodeSelect').value;

                                    if (selectedCountryCode === '+91') {
                                        isValid = validateIndianPhoneNumber(input.value);
                                    } else if (selectedCountryCode === '+1') {
                                        isValid = validateUSPhoneNumber(input.value);
                                    }

                                    var errorSpan = document.getElementById("phoneError");
                                    errorSpan.style.display = isValid ? "none" : "block";
                                }

                                function validateIndianPhoneNumber(phoneNumber) {
                                    //   var regex = /^[789]\d{9}$/;
                                    var regex = /^\d{10}$/;
                                    return regex.test(phoneNumber);
                                }

                                function validateUSPhoneNumber(phoneNumber) {
                                    var regex = /^\d{10}$/;
                                    return regex.test(phoneNumber);
                                }

                                function clearError(errorId) {
                                    const errorElement = document.getElementById(errorId);
                                    errorElement.style.display = "none";
                                }
                            </script>



                            <div class="col-lg-12 position-relative">
                                <label class="form-label">Notify About<span style="color: red;">*</span></label><br>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="notify_options[]" id="notifyOption1" value="1">
                                    <label class="form-check-label" for="notifyOption1">News Letter</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>

                                <!-- <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="notify_options[]" id="notifyOption2" value="2">
                                    <label class="form-check-label" for="notifyOption2">Investment</label>
                                </div> -->

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="notify_options[]" id="notifyOption3" value="3">
                                    <label class="form-check-label" for="notifyOption3">Updates on Milestones</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="notify_options[]" id="notifyOption4" value="4">
                                    <label class="form-check-label" for="notifyOption4">Video tutorials</label>
                                </div>

                                <!-- <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="notify_options[]" id="notifyOption5" value="5">
                                    <label class="form-check-label" for="notifyOption5">Data</label>
                                </div> -->

                                <span id="notifyError" class="text-danger" style="display: none">Please select at least one option</span>
                            </div>


                            <div class="col-lg-12 position-relative">
                                <label class="form-label">I'm Interested in: <span style="color: red;">*</span></label><br>

                                <style>
                                    .checkbox-spacing {
                                        margin-right: 127px;
                                    }
                                </style>

                                <div class="form-check form-check-inline checkbox-spacing">
                                    <input class="form-check-input" type="checkbox" name="interest_options[]" id="interestOption1" value="1">
                                    <label class="form-check-label" for="interestOption1">Using the App</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="interest_options[]" id="interestOption2" value="2">
                                    <label class="form-check-label" for="interestOption2">Becoming a Partner</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="interest_options[]" id="interestOption3" value="3">
                                    <label class="form-check-label" for="interestOption3">Investing in Dozen Diamonds</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="interest_options[]" id="interestOption4" value="4">
                                    <label class="form-check-label" for="interestOption4">Conducting Research</label>
                                </div>



                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="interest_options[]" id="interestOption5" value="5">
                                    <label class="form-check-label" for="interestOption5">Jobs at Dozen Diamonds</label>
                                </div>

                                <span id="interestError" class="text-danger" style="display: none">Please select at least one option</span>
                            </div>






                            <!-- <div class="col-lg-12 position-relative">
                                        <label for="validationDefault03" class="form-label">Email<span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="email" id="validationDefault03"
                                            value="" required />
                                        <span id="emailError" class="text-danger" style="display: none">Please enter
                                            valid email</span>
                                    </div> -->






                            <div class="col-lg-12 position-relative">
                                <label for="validationDefault03" class="form-label">Password<span style="color: red;">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="passwordInput" value="" required="" oninput="validatePassword(this)">
                                    <style>
                                        #togglePasswordButton:hover {
                                            background-color: #ffffff !important;
                                        }
                                    </style>

                                    <button type="button" id="togglePasswordButton" class="btn btn-outline-secondary" onclick="togglePassword('passwordInput', 'togglePasswordButton')">
                                        <img style="height: 30px;" src="<?php echo base_url('images/closeE.jpg'); ?>" alt="close-eye-icon">
                                    </button>

                                </div>
                                <span id="passwordError" class="text-danger" style="display: none">Password must contain: at least 8 characters, 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.</span>
                            </div>

                            <div class="col-lg-12 position-relative">
                                <label for="validationDefault03" class="form-label">Confirm Password<span style="color: red;">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="conf-password" id="confPasswordInput" value="" required="" oninput="confirmPasswordMatch(this)">
                                    <style>
                                        #toggleConfPasswordButton:hover {
                                            background-color: #ffffff !important;
                                        }
                                    </style>

                                    <button type="button" id="toggleConfPasswordButton" class="btn btn-outline-secondary" onclick="togglePassword('confPasswordInput', 'toggleConfPasswordButton')">
                                        <img style="height: 30px;" src="<?php echo base_url('images/closeE.jpg'); ?>" alt="close-eye-icon">
                                    </button>

                                </div>
                                <span id="passwordConfError" class="text-danger" style="display: none">Passwords must match.</span>
                            </div>

                            <!-- <div class="form-group" required>
                                <div class="g-recaptcha" data-sitekey="6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU" required></div>
                            </div> -->

                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU" required></div>
                                <span id="recaptchaError" style="color: red; display: none;">Please complete the reCAPTCHA.</span>
                            </div>

                            <!--<div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU" required=""><div style="width: 304px; height: 78px;"><div><iframe title="reCAPTCHA" width="304" height="78" role="presentation" name="a-hvwvs7hwlm2r" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LelCKYpAAAAAHKFwH7w6ALStffm_X-vz2qH_xeU&amp;co=aHR0cHM6Ly9kb3plbmRpYW1vbmRzLmNvbTo0NDM.&amp;hl=en&amp;v=V6_85qpc2Xf2sbe3xTnRte7m&amp;size=normal&amp;cb=v2jehyahgr94"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div>
								
                                <span id="recaptchaError" style="color: red; display: none;">Please complete the reCAPTCHA.</span>
                            </div>--->

                            <script>
                                function validatePassword(input) {
                                    var isValid = true;
                                    var errorMessage = "";

                                    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*!<>])[0-9a-zA-Z@$#%^&*!<>]{8,}$/;

                                    if (!passwordRegex.test(input.value)) {
                                        isValid = false;
                                        errorMessage = "Password must contain: at least 8 characters, 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character.";
                                    }

                                    document.getElementById("passwordError").textContent = errorMessage;
                                    document.getElementById("passwordError").style.display = isValid ? "none" : "block";
                                }

                                function confirmPasswordMatch(input) {
                                    var passwordInput = document.getElementById("passwordInput");
                                    var isValid = input.value === passwordInput.value;

                                    document.getElementById("passwordConfError").textContent = isValid ? "" : "Passwords must match.";
                                    document.getElementById("passwordConfError").style.display = isValid ? "none" : "block";
                                }

                                function togglePassword(fieldId, buttonId) {
                                    const passwordInput = document.getElementById(fieldId);
                                    const toggleButton = document.getElementById(buttonId);

                                    if (passwordInput.type === "password") {
                                        passwordInput.type = "text";
                                        toggleButton.innerHTML = '<img style="height: 30px;" src="<?php echo base_url('assets/images/openE.png'); ?>" alt="open-eye-icon">';
                                    } else {
                                        passwordInput.type = "password";
                                        toggleButton.innerHTML = '<img style="height: 30px;" src="<?php echo base_url('assets/images/closeE.jpg'); ?>" alt="close-eye-icon">';
                                    }
                                }
                            </script>


                            <div class="col-lg-12">
                                <?= form_submit(array('class' => 'btn enquir-btn', 'id' => 'submitButton', 'style' => 'background-color: #1D4E66;color:white;', 'value' => 'SUBMIT')); ?>
                            </div>
                            <span>
                                Already have an account?<a href="<?php echo base_url('Home/signin'); ?>" style="color: #2f73b2 ;"> LogIn</a>
                            </span>

                            <?= form_close(); ?>
                            <script>
                                function validateForm() {
                                    var isValid = true;

                                    var nameInput = document.getElementById("validationDefault01");
                                    if (nameInput.value.trim() === "" || !/^[A-Za-z\s]+$/.test(nameInput.value.trim())) {
                                        document.getElementById("nameError").textContent = "Name is required and should not contain numbers.";
                                        document.getElementById("nameError").style.display = "block";
                                        isValid = false;
                                    } else {
                                        document.getElementById("nameError").style.display = "none";
                                    }

                                    var emailInput = document.getElementById("validationDefault03");
                                    if (emailInput.value.trim() === "" || !validateEmail(emailInput)) {
                                        document.getElementById("emailError").style.display = "block";
                                        isValid = false;
                                    }

                                    var cityInput = document.getElementById("validationDefault01");
                                    if (cityInput.value.trim() === "") {
                                        document.getElementById("cityError").style.display = "block";
                                        isValid = false;
                                    }


                                    var numberInput = document.getElementById("validationDefault02");
                                    var phoneNumber = numberInput.value.replace(/\D/g, '').slice(0, 10);
                                    var selectedCountryCode = document.getElementById('countryCodeSelect').value;

                                    if (numberInput.value.trim() === "" ||
                                        // (selectedCountryCode === '+91' && !/^[789]\d{9}$/.test(phoneNumber)) ||
                                        (selectedCountryCode === '+91' && !/^\d{10}$/.test(phoneNumber)) ||
                                        (selectedCountryCode === '+1' && !/^\d{10}$/.test(phoneNumber))) {
                                        document.getElementById("phoneError").style.display = "block";
                                        isValid = false;
                                    } else {
                                        document.getElementById("phoneError").style.display = "none";
                                    }

                                    var checkboxes = document.querySelectorAll('input[name="notify_options[]"]');
                                    var isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

                                    if (!isChecked) {
                                        document.getElementById("notifyError").style.display = "block";
                                        isValid = false;
                                    } else {
                                        document.getElementById("notifyError").style.display = "none";
                                    }

                                    var checkboxes = document.querySelectorAll('input[name="interest_options[]"]');
                                    var isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

                                    if (!isChecked) {
                                        document.getElementById("interestError").style.display = "block";
                                        isValid = false;
                                    } else {
                                        document.getElementById("interestError").style.display = "none";
                                    }


                                    var passwordInput = document.getElementById("passwordInput");
                                    if (!validatePasswordFormat(passwordInput)) {
                                        document.getElementById("passwordError").style.display = "block";
                                        isValid = false;
                                    }

                                    var confirmPasswordInput = document.getElementById("confPasswordInput");
                                    if (confirmPasswordInput.value !== passwordInput.value) {
                                        document.getElementById("passwordConfError").textContent = "Passwords must match.";
                                        document.getElementById("passwordConfError").style.display = "block";
                                        isValid = false;
                                    } else {
                                        document.getElementById("passwordConfError").style.display = "none";
                                    }
                                    if (isValid) {
                                        document.getElementById("submitButton").disabled = true;
                                    }

                                    // captcha validation 
                                    var recaptchaResponse = grecaptcha.getResponse();
                                    if (!recaptchaResponse || recaptchaResponse.length === 0) {
                                        document.getElementById("recaptchaError").style.display = "block";
                                        isValid = false;
                                    } else {
                                        document.getElementById("recaptchaError").style.display = "none";
                                    }

                                    if (isValid) {
                                        document.getElementById("submitButton").disabled = true;
                                    } else {
                                        document.getElementById("submitButton").disabled = false;
                                    }

                                    return isValid;
                                }

                                function validateEmail(input) {
                                    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                    return regex.test(input.value);
                                }

                                function validatePasswordFormat(input) {
                                    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*!<>])[0-9a-zA-Z@$#%^&*!<>]{8,}$/;
                                    return passwordRegex.test(input.value);
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- </section> -->
    </section>



</main>

<?php include("application/views/footer.php"); ?>

<script src='https://www.google.com/recaptcha/api.js'></script>


<!-----<script>
      function validateForm() {
          var isValid = true;
  
          var emailInput = document.getElementById("validationDefault03");
          if (emailInput.value.trim() === "" || !validateEmail(emailInput)) {
              document.getElementById("emailError").style.display = "block";
              isValid = false;
          } else {
              document.getElementById("emailError").style.display = "none";
          }
  
          var passwordInput = document.getElementById("passwordInput");
          if (passwordInput.value.trim() === "") {
              document.getElementById("passwordError").style.display = "block";
              isValid = false;
          } else {
              document.getElementById("passwordError").style.display = "none";
          }
  
          // captcha validation 
          var recaptchaResponse = grecaptcha.getResponse();
          if (!recaptchaResponse || recaptchaResponse.length === 0) {
              document.getElementById("recaptchaError").style.display = "block";
              isValid = false;
          } else {
              document.getElementById("recaptchaError").style.display = "none";
          }
  
          if (isValid) {
              document.getElementById("submitButton").disabled = true;
          }
  
          return isValid;
      }
  
      function validateEmail(input) {
          var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          return regex.test(input.value);
      }
  
      function togglePassword() {
          var passwordInput = document.getElementById("passwordInput");
          var toggleButton = document.getElementById("toggleButton");
  
          if (passwordInput.type === "password") {
              passwordInput.type = "text";
              toggleButton.innerHTML = '<img style="height: 30px;" src="</?php echo base_url('assets/images/openE.png');?>" alt="open-eye-icon">';
          } else {
              passwordInput.type = "password";
              toggleButton.innerHTML = '<img style="height: 30px;" src="</?php echo base_url('assets/images/closeE.jpg');?>" alt="close-eye-icon">';
          }
      }
  </script>--->

</body>

</html>