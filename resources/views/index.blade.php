@extends('layouts.app')

<body class="antialiased">
    <header class="fix">
        <img src="{{asset('img/bg2.png')}}" class="vid-bg">
        <div class="overlay">
            @include('layouts.navbar')
        </div>

        <div class="banner-text">
            <p class="banner-title text-primary">IN</p>
            <h1>Krishna Consciousness</h1>
        </div>
    </header>

    <!--HOME ICON SECTION  -->
    <section id="home-icons" class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 text-center">
                    <img src="{{ asset('img/beads.jpg') }}" alt="beads" width="80" height="80">
                    <h3>Chant</h3>
                    <p>Hare Kṛṣṇa Hare Kṛṣṇa Kṛṣṇa Kṛṣṇa Hare Hare
                        <br>
                        Hare Rama Hare Rama Rama Rama Hare Hare
                    </p>
                </div>
                <div class="col-md-4 mb-4 text-center">
                    <img src="{{ asset('img/book.jpg') }}" alt="book" width="80" height="80">
                    <h3>Read Books</h3>
                    <p>Read Srila Prabhupada's Book like Srimad Bhagavad Gita, Srimad Bhagvatam, Sri Chaitanya
                        Caritamrta,
                        etc</p>
                </div>
                <div class="col-md-4 mb-4 text-center">
                    <img src="{{ asset('img/harmonium.jpg') }}" alt="harmonium" width="80" height="80">
                    <h3>Participate in Sankirtana</h3>
                    <p>The only meditation suggested by the lord himself in this age of Kali is Sankirtana.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- services section -->
    <section class="services section-padding py-5">
        <div class="section-header text-center text-white mb-5">
            <h1>Our Services</h1>
        </div>

        <div class="container text-center text-white space">
            <div class="row">
                <div class="col-md-4">
                    <div class="services-inner bg-white text-dark">
                        <div class="services-inner-content">
                            <p class="icon"><i class="fas fa-book"></i></p>
                            <h3 class="service-title">Book Distribution</h3>
                            <p class="service-content">Far far away, behind the word mountains, far from the countries
                                Vokalia and Consonantia, there live the blind texts. Separated they live in
                                Bookmarksgrove
                                right. A small river named Duden flows by their place</p>
                            <button type="button" class="btn btn-md btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Join
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="services-inner bg-white text-dark">
                        <div class="services-inner-content">
                            <p class="icon"><i class="fa fa-apple"></i></p>
                            <h3 class="service-title">Prasadam Distribution</h3>
                            <p class="service-content">Far far away, behind the word mountains, far from the countries
                                Vokalia and Consonantia, there live the blind texts. Separated they live in
                                Bookmarksgrove
                                right. A small river named Duden flows by their place</p>
                            <button type="button" class="btn btn-md btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Join
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="services-inner bg-white text-dark">
                        <div class="services-inner-content">
                            <p class="icon"><i class="fas fa-paw"></i></p>
                            <h3 class="service-title">Gau Seva</h3>
                            <p class="service-content">Far far away, behind the word mountains, far from the countries
                                Vokalia and Consonantia, there live the blind texts. Separated they live in
                                Bookmarksgrove
                                right. A small river named Duden flows by their place</p>
                            <button type="button" class="btn btn-md btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Join
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACTS -->
    <section id="contact">
        <div class="container">
            {{-- Modal button in About Section --}}
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/insertContact" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Full Name"
                                                name="fullname" required>
                                        </div>

                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email" name="email"
                                                required>
                                        </div>

                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+91</span>
                                            </div>
                                            <input type="text" class="form-control" name="mobile"
                                                placeholder="Mobile Number" aria-label="Mobile Number"
                                                aria-describedby="basic-addon1" required>
                                        </div>

                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Address" name="address"
                                                required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Message. . ." name="message"
                                                required></textarea>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="about p-4" style="margin:0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-12 pb-3">
                    <h4 class="text-muted">Address</h4>
                    <p><i class="fa fa-home"></i>&nbsp;Hare Krishna Land, Juhu Andheri-West, Mumbai-400049</p>
                    <p><i class="fa fa-envelope"></i>&nbsp;harekrsnabliss108@gmail.com</p>
                    <p><i class="fa fa-phone"></i>&nbsp;(+91) 8108387600</p>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12 pb-3">
                    <h4 class="text-muted">About </h4>
                    <p>Hare Krsna Bliss means Eternal Bliss is a Spiritual Platform to connect people to Krishna
                        Consciousness where we post Daily Darshans, Life in Hare Krsna Land, Bhagavad Gita, Live
                        Sankirtan,
                        Matchless Gifts, Books, etc.</p>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12 pb-3">
                    <h4 class="text-muted">Stay in touch</h4>
                    <a href="#"><i class="social fa fa-whatsapp fa-2x text-success"></i></a>&nbsp;
                    <a href="#"><i class="social fa fa-facebook fa-2x text-primary"></i></a>&nbsp;
                    <a href="#"><i class="social fa fa-instagram fa-2x text-danger"></i></a>
                    <a href="#"><i class="social fa fa-youtube fa-2x text-danger"></i></a>
                    <br>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                        data-target="#exampleModal">
                        Contact Us
                    </button>
                </div>
            </div>
        </div>
    </section>
</body>

</html>