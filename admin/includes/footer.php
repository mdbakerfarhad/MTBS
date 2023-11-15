<footer class="pt-3 px-2 bg-dark">
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <h5 class="text-warning">MTBS</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="mailto:mtbs@gmail.com" class="nav-link p-0 text-light">Email: mtbs@gmail.com</a></li>
                    <li class="nav-item mb-2"><a href="tel:012345678" class="nav-link p-0 text-light">Phone No. 012345678</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5 class="text-light">Navbar</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="../index" class="nav-link p-0 text-light">Home</a></li>
                    <li class="nav-item mb-2"><a href="../about" class="nav-link p-0 text-light">About</a></li>
                    <li class="nav-item mb-2"><a href="../pricing" class="nav-link p-0 text-light">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="../cineplex" class="nav-link p-0 text-light">Cineplex</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5 class="text-light">Shows</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="../index#now-showing" class="nav-link p-0 text-light">Now Showing</a></li>
                    <li class="nav-item mb-2"><a href="../index#upcoming-shows" class="nav-link p-0 text-light">Upcoming Shows</a></li>
                </ul>
            </div>

            <div class="col-md-5 offset-md-1 mb-3">
                <form>
                    <h5 class="text-light">Subscribe to our newsletter</h5>
                    <p class="text-light">Monthly digest of what's new and exciting from us.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-outline-warning text-light" type="button" disabled>Subscribe</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between pt-4 border-top">
            <p class="text-light">© <span class="update-year"></span> Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="text-light fs-4" href="https://www.facebook.com/" target="_blank" title="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
                    <li class="ms-3"><a class="text-light fs-4" href="https://www.instagram.com/" target="_blank" title="Instagram"><i class="fa-brands fa-square-instagram"></i></a></li>
                    <li class="ms-3"><a class="text-light fs-4" href="https://twitter.com/" target="_blank" title="Twitter"><i class="fa-brands fa-twitter"></i></a></li>
                    <li class="ms-3"><a class="text-light fs-4" href="https://www.youtube.com/" target="_blank" title="Youtube"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
        </div>
    </footer>
    <script>
        // Auto update year 
        const yearUpdate = document.querySelectorAll(".update-year");

        yearUpdate.forEach((element) => {
            element.innerHTML = new Date().getFullYear();
        });
    </script>