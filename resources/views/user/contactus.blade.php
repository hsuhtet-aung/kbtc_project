<x-pagelayout>
    <div class="container-fluid">
        <h1 class="mt-4">Contact Us</h1>
        <div class="row">
            <div class="col-md-6">
                <!-- map here -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d488797.7902156506!2d95.90137478800001!3d16.839609794961667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2sYangon!5e0!3m2!1sen!2smm!4v1606917136519!5m2!1sen!2smm" width="600" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="col-md-6">
                <form class="text-center border border-light p-5" action="{{route('post_contact_message')}}" method="post">
                    @csrf
                    <p class="h4 mb-4 pink-text">Contact Us</p>
                     <!-- Username -->
                     <input type="text" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Username" name="username">
                     @error('username')
                        <p class="text-danger">{{$message}}</p>
                     @enderror
                    <!-- Email -->
                    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                     @enderror

                    <textarea name="message" id="" cols="30" rows="10" class="form-control mb-4"placeholder="Your Message"> </textarea>
                    @error('message')
                        <p class="text-danger">{{$message}}</p>
                     @enderror
                   

                    <!-- Sign in button -->
                    <button class="btn indigo  white-text btn-block my-4" type="submit">Send Message</button>

                </form>
            </div>
        </div>
    </div>
</x-pagelayout>