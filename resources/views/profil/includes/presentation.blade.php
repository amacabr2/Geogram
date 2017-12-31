<ul class="nav nav-tabs" role="tablist" style="border-bottom: #f76234 solid 3px">
    <li class="nav-item">
        <a class="nav-link active" href="#articles" role="tab" data-toggle="tab">Articles</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="btnAbonnes" href="#abonnes" role="tab" data-toggle="tab">Mes abonnés</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="btnAbonnements" href="#abonnements" role="tab" data-toggle="tab">Mes abonnements</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#about" role="tab" data-toggle="tab">A propos</a>
    </li>
</ul>

<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="articles">
        @include('profil.includes.articles')
    </div>

    <div role="tabpanel" class="tab-pane" id="abonnes">
        @include('profil.includes.friends')
    </div>

    <div role="tabpanel" class="tab-pane" id="abonnements">
        @include('profil.includes.friends')
    </div>

    <div role="tabpanel" class="tab-pane" id="about">
        @include('profil.includes.about')
    </div>
</div>
