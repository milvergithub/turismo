@extends('layouts.site')

@section('content')
    <div class="content">
        <!--contact-->
        <div class="contact-w3l">
            <div class="container">
                <h2 class="tittle">Contact us</h2>
                <div class="contact-grids">
                    <div class="col-md-6 contact-grid">
                        <h4>Your Message</h4>
                        <span>Lorem Ipsum is inting and typesetting in simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the is dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                        <form action="#" method="post">
                            <label>Name</label>
                            <input type="text" name="Name" placeholder="Your name" required>
                            <div class="row">
                                <div class="col-md-6 row-grid">
                                    <label>Email</label>
                                    <input type="text" name="Email" placeholder="Email address" required>
                                </div>
                                <div class="col-md-6 row-grid">
                                    <label>Phone</label>
                                    <input type="text" name="Phone" placeholder="Phone number" required>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <label>Subject</label>
                            <input type="text" name="Subject" placeholder="Subject" required>
                            <div class="row1">
                                <label>Message</label>
                                <textarea placeholder="Message" name="Message" ></textarea>
                            </div>
                            <input type="submit" value="Send message">
                        </form>
                    </div>

                    <div class="clearfix"></div>
                </div>

            </div>

            <!--contact-->
        </div>
@endsection

 @push('scripts')

            <script>

            </script>

@endpush