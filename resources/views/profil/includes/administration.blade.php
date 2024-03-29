<ul class="nav nav-tabs" role="tablist" style="border-bottom: #f76234 solid 3px">
    <li class="nav-item">
        <a class="nav-link active" href="#information" role="tab" data-toggle="tab">Mes informations</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="btnAbonnes" href="#abonnes" role="tab" data-toggle="tab">Mes abonnés</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="btnAbonnements" href="#abonnements" role="tab" data-toggle="tab">Mes abonnements</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#articles" role="tab" data-toggle="tab">Mes articles</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#voyages" role="tab" data-toggle="tab">Mes voyages</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="information">
        @include('profil.includes.information')
    </div>

    <div role="tabpanel" class="tab-pane" id="abonnes">
        @include('profil.includes.friends')
    </div>

    <div role="tabpanel" class="tab-pane" id="abonnements">
        @include('profil.includes.friends')
    </div>

    <div role="tabpanel" class="tab-pane" id="articles">
        @include('profil.includes.articles')
    </div>

    <div role="tabpanel" class="tab-pane" id="voyages">
        @include('profil.includes.voyages')
    </div>
</div>