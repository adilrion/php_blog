<div class="container bootstrap snippets bootdeys my-5">
  <div class="row text-center p-2">
    <div class=" col-sm-12 col-md-4 p-4 shadow-sm">
      <div class="contact-detail-box">
        <i class="fa fa-th fa-3x text-primary" style="--bs-text-opacity: .5;"></i>
        <h4>Get In Touch</h4>
        <abbr title="Phone">Phone:</abbr> (123) 456-7890<br>
        Email: <a href="mailto:email@email.com" class="text-muted">email@email.com</a>
      </div>
    </div><!-- end col -->

    <div class="col-sm-12 col-md-4 p-4 shadow-sm">
      <div class="contact-detail-box">
        <i class="fa fa-map-marker fa-3x text-primary" style="--bs-text-opacity: .5;"></i>
        <h4>Our Location</h4>

        <address>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
        </address>
      </div>
    </div><!-- end col -->

    <div class=" col-sm-12 col-md-4 p-4 shadow-sm ">
      <div class="contact-detail-box">
        <i class="fa fa-book fa-3x text-primary" style="--bs-text-opacity: .5;"></i>
        <h4>24x7 Support</h4>
        <address>
          <p class="mb-0">Industry's standard dummy text.</p>
          <!-- <p class="text-muted">1234 567 890</p> -->
        </address>

      </div>
    </div><!-- end col -->

  </div>
  <!-- end row -->


  <div class="row mt-5">
    <div class="col-sm-6">
      <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed/v1/place?q=New+York+University&amp;key=AIzaSyBSFRN6WWGYwmFi498qXXsD2UwkbmD74v4" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="width: 100%; height: 360px;"></iframe>
      </div>
    </div><!-- end col -->

    <!-- Contact form -->
    <div class="col-sm-6">
      <form role="form" name="ajax-form" id="ajax-form" action="https://formsubmit.io/send/coderthemes@gmail.com" method="post" class="form-main">

        <div class="form-group">
          <label for="name2">Name</label>
          <input class="form-control" id="name2" name="name" type="text" placeholder="Name">
          <!--  <div class="error" id="err-name" style="display: none;">Please enter name</div> -->
        </div> <!-- /Form-name -->

        <div class="form-group mt-3">
          <label for="email2">Email</label>
          <input class="form-control" id="email2" name="email" type="text" placeholder="E-mail">
          <!-- <div class="error" id="err-emailvld" style="display: none;">E-mail is not a valid format</div>  -->
        </div> <!-- /Form-email -->

        <div class="form-group mt-3">
          <label for="message2">Message</label>
          <textarea class="form-control" id="message2" name="message" placeholder="Write a Massage" rows="5"></textarea>

          <div class="error" id="err-message" style="display: none;">Please enter message</div>
        </div> <!-- /col -->

        <div class="row mt-2">
          <div class="col-xs-12">
            <!--  <div id="ajaxsuccess" class="text-success">E-mail was successfully sent.</div>
                <div class="error" id="err-form" style="display: none;">There was a problem validating the form please check!</div>
                <div class="error" id="err-timedout">The connection to the server timed out!</div> -->
            <!-- <div class="error" id="err-state"></div> -->
            <button type="submit" class="btn btn-primary btn-shadow btn-rounded " id="send">Submit</button>
          </div> <!-- /col -->
        </div> <!-- /row -->

      </form> <!-- /form -->
    </div> <!-- end col -->

  </div> <!-- end row -->

</div>