@extends('layouts.frontend')

@section('content')
    <!--==================== HOME ====================-->
    <section>
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                <!--========== ISLANDS 1 ==========-->
                <section class="islands swiper-slide">
                    <img src="{{ asset('frontend/assets/img/contact-hero.jpg') }}" alt="" class="islands__bg" />
                    <div class="bg__overlay">
                        <div class="islands__container container">
                            <div class="islands__data">
                                <h2 class="islands__subtitle">Need Travel</h2>
                                <h1 class="islands__title">Contact Us</h1>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!--==================== CONTACT ====================-->
    <section class="contact section" id="contact">
        <div class="contact__container container grid">
            <div class="contact__images">
                <div class="contact__orbe"></div>

                <div class="contact__img">
                    <img src="{{ asset('frontend/assets/img/contact.jpg') }}" alt="" />
                </div>
            </div>

            <div class="contact__content">
                <div class="contact__data">
                    <span class="section__subtitle">Need Help</span>
                    <h2 class="section__title">Don't hesitate to contact us</h2>
                    <p class="contact__description">
                        Is there a problem finding places for yout next trip? Need a
                        guide in first trip or need a consultation about traveling? just
                        contact us.
                    </p>
                </div>

                <div class="contact__card">
                    <div class="contact__card-box">
                        <div class="contact__card-info">
                            <i class="bx bxs-phone-call"></i>
                            <div>
                                <h3 class="contact__card-title">Call</h3>
                                <p class="contact__card-description">022.321.165.19</p>
                            </div>
                        </div>

                        <button class="button contact__card-button">Call Now</button>
                    </div>
                    <div class="contact__card-box">
                        <div class="contact__card-info">
                            <i class="bx bxs-message-rounded-dots"></i>
                            <div>
                                <h3 class="contact__card-title">Whatsapp</h3>
                                <p class="contact__card-description">022.321.165.19</p>
                            </div>
                        </div>

                        <button class="button contact__card-button">Chat Now</button>
                    </div>
                    <div class="contact__card-box">
                        <div class="contact__card-info">
                            <i class="bx bxs-video"></i>
                            <div>
                                <h3 class="contact__card-title">Video Call</h3>
                                <p class="contact__card-description">022.321.165.19</p>
                            </div>
                        </div>

                        <button class="button contact__card-button">
                            Video Call Now
                        </button>
                    </div>
                    <div class="contact__card-box">
                        <div class="contact__card-info">
                            <i class="bx bxs-phone-call"></i>
                            <div>
                                <h3 class="contact__card-title">Message</h3>
                                <p class="contact__card-description">022.321.165.19</p>
                            </div>
                        </div>

                        <button class="button contact__card-button">Message Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==================== CREW ====================-->
    <section class="crew section" id="crew">
        <div class="container">
            <h2 class="crew__title">Crew</h2>

            <div class="crew__wrapper fade-up">
                @foreach (\App\Models\Crew::all() as $crew)
                    <div class="crew__card">
                        <div class="crew__photo">
                            @if ($crew->photo && file_exists(public_path('storage/' . $crew->photo)))
                                <img src="{{ asset('storage/' . $crew->photo) }}" alt="{{ $crew->name }}">
                            @else
                                <span class="crew__placeholder">Picture</span>
                            @endif
                        </div>
                        <h3 class="crew__name">{{ $crew->name ?? 'Nama' }}</h3>
                        <p class="crew__position">{{ $crew->position ?? 'Bagian' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
