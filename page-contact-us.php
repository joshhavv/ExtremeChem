<?php 

    get_header();
    pageBanner();

?>
<div class="small-container">
    <section class="location">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3310.116653142827!2d18.468560314583424!3d-33.93812768063716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcc5d030c98e601%3A0x3c605d021133f158!2s9%20Fairfield%20Rd%2C%20Observatory%2C%20Cape%20Town%2C%207925!5e0!3m2!1sen!2sza!4v1642842661810!5m2!1sen!2sza" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>

    <section class="contact-us">
        <div class="row">
            <div class="col-2 contact-col">
                <h3>Please fill in the form and submit. For enquiries and quotations, kindly send your request!</h3>
                <div>
                    <i class="fas fa-home"></i>
                    <span>
                    <h5>9 Fairfield Road</h5>
                    <p>Observatory, Cape Town</p>
                    </span>
                </div>
                <div>
                    <i class="fas fa-phone-square-alt"></i>
                    <span>
                        <h5>0848836382</h5>
                        <p>Monday - Saturday, 8AM - 4PM </p>
                    </span>
                </div>
    
                <div>
                    <i class="fas fa-envelope"></i>
                    <span>
                    <h5>extremechems@gmail.com</h5>
                    <p>Send us an email</p>
                    </span>
                </div>
    
            </div>
            <div class="col-2 contact-col">
                <form action="">
                    <input type="text" placeholder="Name" required>
                    <input type="email" placeholder="Email" required>
                    <input type="tel" placeholder="Phone Number" required>
                    <textarea name="" rows="7" placeholder="Message" required></textarea>
                    <button type="submit" class="btn">Send Message</button>
                </form>
            </div>
        </div>

    </section>
            
</div>
        
<?php 

    get_footer();

?>
