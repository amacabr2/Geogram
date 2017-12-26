<section class="container" style="margin-top: 2em;">
    @forelse($abonnements as $abonnement)
        {{ $abonnement->pseudo }}
    @empty
        <p>Vous n'avez aucun abonnements.</p>
    @endforelse

    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <div class="card card-rotative">
                <div class="front">
                    <div class="cover">
                        <img src="{{ asset('img/bg1.jpg') }}"/>
                    </div>
                    <div class="user">
                        <img class="rounded-circle" src="{{ asset('img/avatar.jpg') }}"/>
                    </div>
                    <div class="content">
                        <div class="main">
                            <h3 class="name">John Marvel</h3>
                            <p class="profession">CEO</p>
                            <p class="text-center">"I'm the new Sinatra, and since I made it here I can make it anywhere, yeah, they love me everywhere"</p>
                        </div>
                        <div class="footer">
                            <i class="fa fa-mail-forward"></i> Auto Rotation
                        </div>
                    </div>
                </div>

                <div class="back">
                    <div class="header">
                        <h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>
                    </div>
                    <div class="content">
                        <div class="main">
                            <h4 class="text-center">Job Description</h4>
                            <p class="text-center">Web design, Adobe Photoshop, HTML5, CSS3, Corel and many others...</p>

                            <div class="stats-container">
                                <div class="stats">
                                    <h4>235</h4>
                                    <p>
                                        Followers
                                    </p>
                                </div>
                                <div class="stats">
                                    <h4>114</h4>
                                    <p>
                                        Following
                                    </p>
                                </div>
                                <div class="stats">
                                    <h4>35</h4>
                                    <p>
                                        Projects
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>