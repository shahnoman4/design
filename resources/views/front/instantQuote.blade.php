@extends('front.layouts.master')


@section('styles')
<style>
    .step {
        display: none;
    }

    .active {
        display: block;
    }
</style>
@endsection

@section('front-content')
<!-- instant quote step one -->
<div class="step active" id="step1">
    <section id="instantQuoteStep1" class="bg-light p-top-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 pe-5 paddingLeftRightMob">
                    <h1 class="section-heading">INSTANT QUOTE</h1>
                    <p class="section-para mt-4 mb-4">Share your project requirements with us and get started below with
                        our estimation calculator, once you have thought about what you want, save your quote and we
                        will send it to you.</p>
                    <p class="small-para">PLEASE CHOOSE SERVICE OF DRAWINGS REQUIRED FOR YOUR PROJECT</p>
                    <div class="instant-quote-wrapper mb-3">
                        <button class="btnCss mobMargin"> PLANNING </button>
                        <button class="btnCss mobMargin"> BUILDING REGULATIONS </button>
                        <button class="btnCss mt-md-4"> PLANNING & BUILDING REGULATIONS </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 shadowBg">
                    <div class="instant-quote-right-wrapper bg-white">
                        <div class="instant-quote-right-inner">
                            <p class="planning"> PLANNING <span class="float-end"> £ 0 </span></p>
                            <p class="planning"> BUILDING REG <span class="float-end"> £ 0 </span></p>
                            <p class="planning"> PLANNING & BUILDING <span class="float-end"> £ 0 </span></p>
                            <p class=""> SUB TOTAL <span class="float-end"> £ 0 </span></p>
                            <p class=""> VAT <span class="float-end"> £ 0 </span></p>
                            <hr>
                            <p class=""> TOTAL <span class="float-end"> £ 0 </span></p>
                        </div>
                    </div>
                </div>
            </div> <!--/row-->
        </div> <!--/container-->
    </section> <!-- instant quote step one -->
    <section id="next-pre-btn" class="bg-light p-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="d-flex justify-content-between">
                        <button class="btnCss m-right next"> Next </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12"></div>
            </div> <!-- /row -->
        </div> <!-- /container -->
    </section> <!-- /next previous button -->
</div>

<div class="step" id="step2">
    <!-- instant quote step two -->
    <section id="instantQuoteStep2" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 pe-5 paddingLeftRightMob">
                    <h2 class="section-heading mb-3">INSTANT QUOTE</h2>
                    <h5>ARE YOU IN CONSERVATION AREA OR LISTED BUILDING?</h5>
                    <div class="d-flex mobDblock">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="radioOptions" id="radioOption1"
                                value="option1">
                            <label class="form-check-label" for="radioOption1">
                                CONSERVATION AREA
                            </label>
                        </div>

                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="radioOptions" id="radioOption2"
                                value="option2">
                            <label class="form-check-label" for="radioOption2">
                                LISTED BUILDING
                            </label>
                        </div>

                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="radioOptions" id="radioOption3"
                                value="option3">
                            <label class="form-check-label" for="radioOption3">
                                NONE
                            </label>
                        </div>
                    </div>

                    <h5 class="mt-4">WHAT IS YOUR PROPERTY TYPE?</h5>
                    <div class="d-flex propertyTpyeCss">
                        <div class="form-group me-3">
                            <label for="selectOptions">0-2 BEDS</label>
                            <select class="form-select radius32" id="selectOptions" name="selectOptions">
                                <option value="optionA">SEMI-DETACHED</option>
                                <option value="optionB">DETACHED</option>
                                <option value="optionC">TERRACE</option>
                                <option value="optionC">END-TERRACE</option>
                                <option value="optionC">FLAT</option>
                                <option value="optionC">BUNGALOW</option>
                                <option value="optionC">NEW BUILT</option>
                                <option value="optionC">OTHERS</option>
                            </select>
                        </div>
                        <div class="form-group me-3">
                            <label for="selectOptions2">3-4 BEDS</label>
                            <select class="form-select radius32" id="selectOptions2" name="selectOptions2">
                                <option value="optionA">SEMI-DETACHED</option>
                                <option value="optionB">DETACHED</option>
                                <option value="optionC">TERRACE</option>
                                <option value="optionC">END-TERRACE</option>
                                <option value="optionC">FLAT</option>
                                <option value="optionC">BUNGALOW</option>
                                <option value="optionC">NEW BUILT</option>
                                <option value="optionC">OTHERS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selectOptions3">5+ BEDS</label>
                            <select class="form-select radius32" id="selectOptions3" name="selectOptions3">
                                <option value="optionA">SEMI-DETACHED</option>
                                <option value="optionB">DETACHED</option>
                                <option value="optionC">TERRACE</option>
                                <option value="optionC">END-TERRACE</option>
                                <option value="optionC">FLAT</option>
                                <option value="optionC">BUNGALOW</option>
                                <option value="optionC">NEW BUILT</option>
                                <option value="optionC">OTHERS</option>
                            </select>
                        </div>
                    </div>


                    <h5 class="mt-4">WHAT SIZE OF YOUR OVERALL PROPERTY?</h5>
                    <div class="d-flex">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="radioOptions4" id="radioOption4"
                                value="option1">
                            <label class="form-check-label" for="radioOption4">
                                < 150 SQM </label>
                        </div>

                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="radioOptions4" id="radioOption5"
                                value="option2">
                            <label class="form-check-label" for="radioOption5">
                                > 150 SQM
                            </label>
                        </div>
                    </div>


                    <h5 class="mt-4">DO YOU NEED A SITE SURVEY?</h5>
                    <div class="d-flex mb-md-4 mobMargin">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="radioOptions5" id="radioOption6"
                                value="option1">
                            <label class="form-check-label" for="radioOption6">
                                YES
                            </label>
                        </div>

                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="radioOptions5" id="radioOption7"
                                value="option2">
                            <label class="form-check-label" for="radioOption7">
                                NO, I WILL MEASURE IT
                            </label>
                        </div>
                    </div>



                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 shadowBg">
                    <div class="instant-quote-right-wrapper bg-white">
                        <div class="instant-quote-right-inner">
                            <p class="planning"> PLANNING <span class="float-end"> £ 0 </span></p>
                            <p class="planning"> BUILDING REG <span class="float-end"> £ 0 </span></p>
                            <p class="planning"> PLANNING & BUILDING <span class="float-end"> £ 0 </span></p>
                            <p class=""> SUB TOTAL <span class="float-end"> £ 0 </span></p>
                            <p class=""> VAT <span class="float-end"> £ 0 </span></p>
                            <hr>
                            <p class=""> TOTAL <span class="float-end"> £ 0 </span></p>


                        </div>

                    </div>

                </div>
            </div> <!--/row-->
        </div> <!--/container-->
    </section> <!-- instant quote step two -->
    <section id="next-pre-btn" class="bg-light p-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="d-flex justify-content-between">
                        <button class="btnCss prev"> Previous </button>
                        <button class="btnCss m-right next"> Next </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12"></div>
            </div> <!-- /row -->
        </div> <!-- /container -->
    </section> <!-- /next previous button -->
</div>

<div class="step" id="step3">
    <!-- instant quote step three -->
    <section id="instantQuoteStep3" class="bg-light section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 pe-5 paddingLeftRightMob">
                    <h2 class="section-heading mb-3">INSTANT QUOTE</h2>
                    <h5>WHICH PART OF THE PROPERTY WILL BE DEVELOPED?</h5>
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="radioOptions6" id="radioOption8"
                            value="option1">
                        <label class="form-check-label" for="radioOption8">
                            PORCH
                        </label>
                    </div>

                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="radioOptions6" id="radioOption9"
                            value="option2">
                        <label class="form-check-label" for="radioOption9">
                            GARAGE
                        </label>
                    </div>

                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="radioOptions6" id="radioOption10"
                            value="option3">
                        <label class="form-check-label" for="radioOption10">
                            DOUBLE STOREY
                        </label>

                        <div class="double-story-submenu submenu-div-style bg-dark ms-2 radius32 text-white">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="radioOptions7" id="rear1"
                                    value="option1">
                                <label class="form-check-label" for="rear1">
                                    Rear
                                </label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="radioOptions7" id="rear2"
                                    value="option1">
                                <label class="form-check-label" for="rear2">
                                    Side
                                </label>

                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="radioOptions7" id="rear3"
                                    value="option1">
                                <label class="form-check-label" for="rear3">
                                    Wrap around
                                </label>
                            </div>

                        </div>

                    </div>

                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="radioOptions6" id="radioOption11"
                            value="option3">
                        <label class="form-check-label" for="radioOption11">
                            GROUND FLOOR
                        </label>

                        <div class="ground-floor-submenu submenu-div-style bg-dark ms-2 radius32 text-white">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="groundFlooor-submenu"
                                    id="groundFloorRear" value="option1">
                                <label class="form-check-label" for="groundFloorRear">
                                    Rear
                                </label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="groundFlooor-submenu"
                                    id="groundFlooor-submenu2" value="option1">
                                <label class="form-check-label" for="groundFlooor-submenu2">
                                    Rear & Infill
                                </label>

                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="groundFlooor-submenu"
                                    id="groundFlooor-submenu3" value="option1">
                                <label class="form-check-label" for="groundFlooor-submenu3">
                                    Side
                                </label>
                            </div>

                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="groundFlooor-submenu"
                                    id="groundFlooor-submenu4" value="option1">
                                <label class="form-check-label" for="groundFlooor-submenu4">
                                    Side & Rear
                                </label>
                            </div>

                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="groundFlooor-submenu"
                                    id="groundFlooor-submenu5" value="option1">
                                <label class="form-check-label" for="groundFlooor-submenu5">
                                    Side Infill
                                </label>
                            </div>

                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="groundFlooor-submenu"
                                    id="groundFlooor-submenu6" value="option1">
                                <label class="form-check-label" for="groundFlooor-submenu6">
                                    Side Infill Wrap Around
                                </label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="groundFlooor-submenu"
                                    id="groundFlooor-submenu7" value="option1">
                                <label class="form-check-label" for="groundFlooor-submenu7">
                                    Wrap Around
                                </label>
                            </div>

                        </div>

                    </div>

                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="radioOptions6" id="radioOption12"
                            value="option3">
                        <label class="form-check-label" for="radioOption12">
                            FIRST FLOOR
                        </label>

                        <div class="first-floor-submenu submenu-div-style bg-dark ms-2 radius32 text-white">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="firstFloor-submenu"
                                    id="firstFloor-submenu" value="option1">
                                <label class="form-check-label" for="firstFloor-submenu">
                                    Rear
                                </label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="firstFloor-submenu"
                                    id="firstFloor-submenu2" value="option1">
                                <label class="form-check-label" for="firstFloor-submenu2">
                                    Side
                                </label>

                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="firstFloor-submenu"
                                    id="firstFloor-submenu3" value="option1">
                                <label class="form-check-label" for="firstFloor-submenu3">
                                    Full Width Rear
                                </label>
                            </div>

                        </div>

                    </div>

                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="radioOptions6" id="radioOption13"
                            value="option3">
                        <label class="form-check-label" for="radioOption13">
                            LOFT CONVERSION
                        </label>

                        <div class="loft-conversion-submenu submenu-div-style bg-dark ms-2 radius32 text-white">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="loft-conversion-submenu"
                                    id="loftConversionSubmenu" value="option1">
                                <label class="form-check-label" for="loftConversionSubmenu">
                                    DORMER
                                </label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="loft-conversion-submenu"
                                    id="loftConversionSubmenu2" value="option1">
                                <label class="form-check-label" for="loftConversionSubmenu2">
                                    FRONT DORMER
                                </label>

                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="loft-conversion-submenu"
                                    id="loftConversionSubmenu3" value="option1">
                                <label class="form-check-label" for="loftConversionSubmenu3">
                                    HIP GABLE DORMER
                                </label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="loft-conversion-submenu"
                                    id="loftConversionSubmenu4" value="option1">
                                <label class="form-check-label" for="loftConversionSubmenu4">
                                    L SHAPED DORMER
                                </label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="loft-conversion-submenu"
                                    id="loftConversionSubmenu5" value="option1">
                                <label class="form-check-label" for="loftConversionSubmenu5">
                                    HIP TO GABLE
                                </label>
                            </div>

                        </div>

                    </div>

                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="radioOptions6" id="radioOption14"
                            value="option3">
                        <label class="form-check-label" for="radioOption14">
                            OUTBUILDING
                        </label>
                    </div>

                    <h5 class="mt-3">DO YOU NEED PARTY WALL NOTICE?</h5>
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="radioOptions6" id="radioOption8"
                            value="option1">
                        <label class="form-check-label" for="radioOption8">
                            Yes
                        </label>
                    </div>

                    <div class="form-check me-3">

                        <input class="form-check-input" type="radio" name="radioOptions6" id="radioOption8"
                            value="option1">
                        <label class="form-check-label" for="radioOption8">
                            No
                        </label>
                    </div>

                    <div class="form-check me-3 mobMargin">

                        <input class="radius32 p-2" type="text" name="numberOfNeighbour" id="numberOfNeighbour">
                        <label for="numberOfNeighbour">
                            NUMBER OF NEIGHBOURS
                        </label>
                    </div>

                    <h5 class="mt-3">DO YOU WANT WE ACT BEHALF OF YOU?</h5>
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="radioOptions6" id="radioOption8"
                            value="option1">
                        <label class="form-check-label" for="radioOption8">
                            Yes
                        </label>
                    </div>

                    <div class="form-check me-3">

                        <input class="form-check-input" type="radio" name="radioOptions6" id="radioOption8"
                            value="option1">
                        <label class="form-check-label" for="radioOption8">
                            No
                        </label>
                    </div>
                    <div class="form-check me-3 mobMargin">
                        <label for="numberOfNeighbour">
                            WE WILL CONTACT YOU TO DISCUSS FURTHER
                        </label>
                    </div>

                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 mt-md-4 shadowBg">
                    <div class="instant-quote-right-wrapper bg-white">
                        <div class="instant-quote-right-inner">
                            <p class="planning"> PLANNING <span class="float-end"> £ 0 </span></p>
                            <p class="planning"> BUILDING REG <span class="float-end"> £ 0 </span></p>
                            <p class="planning"> PLANNING & BUILDING <span class="float-end"> £ 0 </span></p>
                            <p class=""> SUB TOTAL <span class="float-end"> £ 0 </span></p>
                            <p class=""> VAT <span class="float-end"> £ 0 </span></p>
                            <hr>
                            <p class=""> TOTAL <span class="float-end"> £ 0 </span></p>
                        </div>

                    </div>

                </div>
            </div> <!--/row-->
        </div> <!--/container-->
    </section> <!-- instant quote step three -->
    <section id="next-pre-btn" class="bg-light p-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="d-flex justify-content-between">
                        <button class="btnCss prev"> Previous </button>
                        <button class="btnCss m-right next"> Next </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12"></div>
            </div> <!-- /row -->
        </div> <!-- /container -->
    </section> <!-- /next previous button -->
</div>

<div class="step" id="step4">
    <!-- instant quote step four -->
    <section id="instantQuoteStep4" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 pe-5 paddingLeftRightMob">
                    <h2 class="section-heading mb-3">INSTANT QUOTE</h2>
                    <h5 class="mt-4">DO YOU NEED 3D DRAWINGS?</h5>
                    <div class="d-flex">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="3dDrawing" id="3dDrawing"
                                value="option1">
                            <label class="form-check-label" for="3dDrawing">
                                Yes </label>
                        </div>

                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="3dDrawing" id="3dDrawing2"
                                value="option2">
                            <label class="form-check-label" for="3dDrawing2">
                                No
                            </label>
                        </div>
                    </div>


                    <h5 class="mt-4">DO YOU NEED BUILD OVER AGREEMENT DRAWINGS?</h5>
                    <div class="d-flex">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="agreementDrawing" id="agreementDrawing1"
                                value="option1">
                            <label class="form-check-label" for="agreementDrawing1">
                                Yes
                            </label>
                        </div>

                        <div class="form-check me-3 mobMargin">
                            <input class="form-check-input" type="radio" name="agreementDrawing" id="agreementDrawing2"
                                value="option2">
                            <label class="form-check-label" for="agreementDrawing2">
                                No
                            </label>
                        </div>
                    </div>
                        <div class="form-check me-3 mobMargin">
                            <label for="numberOfNeighbour">
                                THE BUILD OVER AGREEMENT OR LOCAL AUTHORITY FEES IS NOT INCLUDED.WE WILL CONTACT YOU FOR FURTHER DETAIL. 
                            </label>
                        </div>



                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 mt-md-4 shadowBg">
                    <div class="instant-quote-right-wrapper bg-white">
                        <div class="instant-quote-right-inner">
                            <p class="planning"> PLANNING <span class="float-end"> £ 0 </span></p>
                            <p class="planning"> BUILDING REG <span class="float-end"> £ 0 </span></p>
                            <p class="planning"> PLANNING & BUILDING <span class="float-end"> £ 0 </span></p>
                            <p class=""> SUB TOTAL <span class="float-end"> £ 0 </span></p>
                            <p class=""> VAT <span class="float-end"> £ 0 </span></p>
                            <hr>
                            <p class=""> TOTAL <span class="float-end"> £ 0 </span></p>


                        </div>

                    </div>

                </div>
            </div> <!--/row-->
        </div> <!--/container-->
    </section> <!-- instant quote step four -->
    <section id="next-pre-btn" class="bg-light p-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="d-flex justify-content-between">
                        <button class="btnCss prev"> Previous </button>
                        <button class="btnCss m-right next"> Next </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12"></div>
            </div> <!-- /row -->
        </div> <!-- /container -->
    </section> <!-- /next previous button -->
</div>

<div class="step" id="step5">
    <!-- instant quote step five -->
    <section id="instantQuoteStep5" class="section-padding bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 pe-5 paddingLeftRightMob">
                    <h2 class="section-heading mb-3">INSTANT QUOTE</h2>
                    <h5 class="mt-4">PLEASE ENTER YOUR DETAILS</h5>

                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold"> Title </label>
                        <input type="text" placeholder="Mr/Miss/Mrs" class="form-control" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="fname" class="form-label fw-bold"> First Name </label>
                        <input type="text" placeholder="Mr/Miss/Mrs" class="form-control" id="fname">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label fw-bold"> Last Name </label>
                        <input type="text" placeholder="Mr/Miss/Mrs" class="form-control" id="lastname">
                    </div>

                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 mt-md-4 shadowBg">
                    <div class="instant-quote-right-wrapper bg-white">
                        <div class="instant-quote-right-inner">
                            <p class="planning"> PLANNING <span class="float-end"> £ 0 </span></p>
                            <p class="planning"> BUILDING REG <span class="float-end"> £ 0 </span></p>
                            <p class="planning"> PLANNING & BUILDING <span class="float-end"> £ 0 </span></p>
                            <p class=""> SUB TOTAL <span class="float-end"> £ 0 </span></p>
                            <p class=""> VAT <span class="float-end"> £ 0 </span></p>
                            <hr>
                            <p class=""> TOTAL <span class="float-end"> £ 0 </span></p>


                        </div>

                    </div>

                </div>
            </div> <!--/row-->
        </div> <!--/container-->
    </section> <!-- instant quote step five -->
    <section id="next-pre-btn" class="bg-light p-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="d-flex justify-content-between">
                        <button class="btnCss prev"> Previous </button>
                        <button class="btnCss m-right next"> Next </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12"></div>
            </div> <!-- /row -->
        </div> <!-- /container -->
    </section> <!-- /next previous button -->
</div>

<div class="step" id="step6">
    <!-- instant quote step six -->
    <section id="instantQuoteStep6" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 pe-5 paddingLeftRightMob">
                    <h2 class="section-heading mb-3">INSTANT QUOTE</h2>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold"> Email </label>
                        <input type="email" placeholder="example@email.com" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label fw-bold"> Phone Number </label>
                        <input type="tel" placeholder="+123456789" class="form-control" id="phoneNumber">
                    </div>
                    <div class="mb-3">
                        <label for="postcode" class="form-label fw-bold"> Post Code </label>
                        <input type="text" placeholder="ig2 6x3 4bt6" class="form-control" id="postcode">
                    </div>

                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="termsCondtions" id="termsCondtions"
                            value="option1">
                        <label class="form-check-label" for="termsCondtions">
                            I READ AND AGREE TO TERMS AND CONDITIONS
                        </label>
                    </div>
                    <!-- <button class="btnCss mt-5 mobMargin" id="instantQuoteSubmit"> SAVE & SEND ME THE QUOTE </button> -->


                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 mt-md-4 shadowBg">
                    <div class="instant-quote-right-wrapper bg-white">
                        <div class="instant-quote-right-inner">
                            <p class="planning"> PLANNING <span class="float-end"> £ 0 </span></p>
                            <p class="planning"> BUILDING REG <span class="float-end"> £ 0 </span></p>
                            <p class="planning"> PLANNING & BUILDING <span class="float-end"> £ 0 </span></p>
                            <p class=""> SUB TOTAL <span class="float-end"> £ 0 </span></p>
                            <p class=""> VAT <span class="float-end"> £ 0 </span></p>
                            <hr>
                            <p class=""> TOTAL <span class="float-end"> £ 0 </span></p>


                        </div>

                    </div>

                </div>
            </div> <!--/row-->
        </div> <!--/container-->
    </section> <!-- instant quote step six -->
    <section id="next-pre-btn" class="bg-light p-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="d-flex justify-content-between">
                        <button class="btnCss prev"> Previous </button>
                        <button class="btnCss m-right submit"> SAVE & SEND ME THE QUOTE  </button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12"></div>
            </div> <!-- /row -->
        </div> <!-- /container -->
    </section> <!-- /next previous button -->
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function () {
    var currentStep = 1;
    $(".next").click(function () {
        if (currentStep < 6) {
            $("#step" + currentStep).removeClass("active");
            currentStep++;
            $("#step" + currentStep).addClass("active");
        }
    });
    $(".prev").click(function () {
        if (currentStep > 1) {
            $("#step" + currentStep).removeClass("active");
            currentStep--;
            $("#step" + currentStep).addClass("active");
        }
    });
    $(".submit").click(function () {
        // Add your form submission logic here
        alert("Form submitted successfully!");
    });
});
</script>   
@endsection