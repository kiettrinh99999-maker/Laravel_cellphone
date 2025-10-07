@extends('layouts.layout')
@section('active_Contact')
active
@endsection
@section('nav')
<x-navcontent navcontent="Contact Us"/>
@endsection
@section('title')
Contact
@endsection
@section('link')
<x-contact />
@endsection
@section('linkjs')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('content');
    extraPlugins: 'base64image'
</script>

@endsection
@section('content')
<!-- Contact Page Content -->
    <div class="contact-page">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Send us a Message</h3>
            {{-- <form action="#" method="post" class="contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Phone Number" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="content" id="content" class="form-control" rows="5" placeholder="Your Message" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary"><i class="fa fa-envelope"></i> Send Message</button>
            </form> --}}
            <form action="{{ route('contact.send') }}" method="post" class="contact-form">
              @csrf
              <div class="form-group">
                  <input type="text" pattern="(0)[0-9]{9}" name="phone" class="form-control" placeholder="Your Phone Number" required>
              </div>
              <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                  <input type="text" name="subject" class="form-control" placeholder="Subject" required>
              </div>
              <div class="form-group">
                  <textarea name="content" id="content" class="form-control" rows="5" placeholder="Your Message" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary"><i class="fa fa-envelope"></i> Send Message</button>
          </form>


          </div>
          <div class="col-md-6">
            <h3>Our Contact Information</h3>
            <p><i class="fa fa-map-marker"></i> 123 Street, City, Country</p>
            <p><i class="fa fa-phone"></i> +123 456 789</p>
            <p><i class="fa fa-envelope"></i> support@ustora.com</p>
            <p><i class="fa fa-globe"></i> www.ustora.com</p>
            <br>
            <iframe src="https://maps.google.com/maps?q=New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                    width="100%" height="250" frameborder="0" style="border:0"></iframe>
          </div>
        </div>
      </div>
    </div>
    <!-- End Contact Page -->
    @endsection