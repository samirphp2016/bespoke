<?php include 'partials/_header.php';?>

<!-- Claims Page Start -->
<main id="claims">
    <!-- Hero Banner Start -->

    <section class="hero-banner" style="background-image: url(assets/images/hero-banner/claims.png);">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="hero-banner-docs">
                        <h2 class="fw-700 text-White">Make a Claim with Bespoke Insurance</h2>
                        <b class="fw-600 text-White">
                            Make a Claim with Bespoke Insurance
                        </b>
                        <div class="Badge">
                            <div class="Badge-img">
                                <img data-src="assets/images/banner/Badge.png" alt="Badge" title="Badge" class="lazy" />
                            </div>
                            <div class="Badge-info">
                                <h4 class="text-White">
                                    Access to Over 100 Australian Insurers
                                </h4>
                                <hr class="text-Teal" />
                                <p class="text-Grey-white-bg fw-400">
                                    Finding the best tailored coverage options for you
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero Banner End -->

    <!-- Mini CTAs Start -->

    <section class="Mini-CTAs">
        <div class="container">
            <div class="row">
                <div class="Mini-CTAs-col">
                    <h6 class="text-Teal fw-600">We Understand You</h6>
                    <p class="text-Grey-white-bg fw-400">
                        We understand that the claims process is never what you want. It can seem complicated, stressful and overwhelming.
                    </p>
                </div>
                <div class="Mini-CTAs-col">
                    <h6 class="text-Teal fw-600">Convenience & Efficiency</h6>
                    <p class="text-Grey-white-bg fw-400">
                        Our highly experienced in-house claims team will streamline that process and work with you and the insurer to ensure you receive your entitlement without delay
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mini CTAs End -->

    <!-- Claims Contact Start -->

    <section class="claims-contact">
        <div class="container">
            <p class="fw-400 con-title">Please contact us on <a href="#" class="fw-600"> 1300 030 555 </a> to lodge a claim, or alternatively <b class="fw-600">complete the form below </b> and we will respond to you within 24hrs:</p>
            <form class="form-claims">
                <div class="form-section-claims pb-60">
                    <h2 class="text-Dark-Grey form-claims-title">
                        Your Identity
                    </h2>
                    <div class="form-claims-grup">
                        <label for="fName" class="form-label fw-500"> Please enter your <b class="fw-600"> first name</b> </label>
                        <input type="text" class="form-control" id="fName" placeholder="Eg: John" value="" pattern="[A-Za-z\]{1,30}" required />
                    </div>
                    <div class="form-claims-grup">
                        <label for="lName" class="form-label fw-500"> Please enter your <b class="fw-600"> last name </b> </label>
                        <input type="text" class="form-control" id="lName" placeholder="Eg: Doe" value="" pattern="[A-Za-z\]{1,30}" required />
                    </div>
                </div>
                <div class="form-section-claims pb-60">
                    <h2 class="text-Dark-Grey form-claims-title">
                        Contact Information
                    </h2>
                    <div class="form-claims-grup">
                        <label for="email" class="form-label fw-500"> Please enter your <b class="fw-600"> email address </b> </label>
                        <input type="email" class="form-control" id="email" placeholder="Eg: name@example.com" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                    </div>
                    <div class="form-claims-grup">
                        <label for="mobile" class="form-label fw-500"> Please enter your <b class="fw-600"> phone number </b> </label>
                        <input type="tel" class="form-control" id="mobile" placeholder="Eg: 0400 000 000" value="" pattern="[0-9]{10}" required />
                    </div>
                    <div class="form-claims-grup">
                        <label for="policy-number" class="form-label fw-500"> Please enter your <b class="fw-600"> policy number </b> </label>
                        <input type="text" class="form-control" id="policy-number" placeholder="Located on your insurance card" value="" pattern="[A-Za-z\]{1,300}" required />
                    </div>
                </div>
                <div class="form-section-claims">
                    <h2 class="text-Dark-Grey form-claims-title">
                        Claim Details
                    </h2>
                    <div class="form-claims-grup">
                        <label for="" class="form-label fw-500"> Name of <b class="fw-600"> insured person </b> or <b class="fw-600"> business name </b> </label>
                        <input type="text" class="form-control" id="" placeholder="Eg: Michael Smith or Smith's Automotives Pty Ltd" value="" pattern="" required />
                    </div>
                    <div class="form-claims-grup">
                        <label for="" class="form-label fw-500"> Please enter the <b class="fw-600"> Date of Loss </b> </label>
                        <input type="text" class="form-control" id="" placeholder="Select date here" value="" pattern="" required />
                    </div>
                    <div class="form-claims-grup">
                        <label for="" class="form-label fw-500"> Please provide the <b class="fw-600"> Loss Location </b> </label>
                        <input type="text" class="form-control" id="" placeholder="Enter location address" value="" pattern="" required />
                    </div>
                    <div class="form-claims-grup">
                        <label for="" class="form-label fw-500"> Please provide your <b class="fw-600"> Third Party Name </b> </label>
                        <input type="text" class="form-control" id="" placeholder="Enter location address" value="" pattern="" required />
                    </div>
                    <div class="form-claims-grup">
                        <label for="" class="form-label fw-500"> Please provide the <b class="fw-600"> Third Party Address </b> </label>
                        <input type="text" class="form-control" id="" placeholder="Enter location address" value="" pattern="" required />
                    </div>
                    <div class="form-claims-grup">
                        <label for="" class="form-label fw-500"> Please provide a <b class="fw-600"> Description </b> of the event </label>
                        <textarea class="form-control" id="" rows="3" placeholder="Enter your message here" value="" required></textarea>
                    </div>
                    <div class="form-claims-grup form-claims-grup-file">
                        <label for="" class="form-label-file fw-500">
                            <p><b class="fw-600"> Upload </b> Upload any relevant files or images that you feel may help us with your claim (optional)</p>
                        </label>
                        <input type="file" id="myfile" class="form-control form-control-file" name="myfile" placeholder="Enter your message here" />
                        <img data-src="assets/images/claims/claims.png" alt="file Upload" title="file Upload" class="lazy file-Upload" />
                    </div>
                    <div class="file-uploaded">
                        <p class="file-uploaded-title"><i class="fa fa-check text-Teal" aria-hidden="true"></i> <span>2</span> files uploaded successfully</p>
                        <div class="file-uploaded-item">
                            <span class="file-name">
                                img_47102_1
                            </span>
                            <span class="file-closs">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <div class="file-uploaded-item">
                            <span class="file-name">
                                img_47102_2
                            </span>
                            <span class="file-closs">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                    </div>
                    <div class="Claim-Submit">
                        <p class="fw-400 text-Dark-Grey">We will respond to you within <b class="fw-600">24hrs</b> (business hours) of your submission</p>
                        <button type="submit" class="btn btn-bg">Submit Your Claim</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Claims Contact End -->
</main>
<!--  Claims Page End -->

<?php include 'partials/_cta-bottom.php';?>

<?php include 'partials/_footer.php';?>
