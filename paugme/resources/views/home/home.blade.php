@extends('master')


@section('content')
    <div class="home">
        <div class="home__welcome">
            <div class="home__welcome_card">
                <div class="home__welcome_panel">
                    <div class="home__welcome_icon">
                        <img src="/images/logo.png"/>
                    </div>
                    <h1>Paugme Packs</h1>

                    <h2>Educational kits for children</h2>


                    @include('home._sign-up-form')
                </div>
            </div>
        </div>

        <div class="home__about">
            <blockquote>
                <p>&ldquo;Wow, this is a great quote.&rdquo;</p>

                <cite>
                    <p>- My name should be gray</p>
                </cite>
            </blockquote>
        </div>

        <div class="home__packages">
            <p>Paugme Packs deliver new educational kits to you once a month!</p>
            <p>Get all of the following packs!</p>

            <div class="home__packages_pack">
                <div class="row-fluid">
                    <div class="column one-third">
                        <img class="img-responsive" src="http://placehold.it/200x200"/>
                    </div>
                    <div class="column two-thirds">
                        <h2>Circuits</h2>
                        <p>
                            Learn circuits, logic, and how to make
                            a motion sensor device!
                        </p>
                        <p>
                            Includes:
                        </p>
                        <ul>
                            <li>Activities</li>
                            <li>Flash Cards</li>
                            <li>Learning Book</li>
                            <li>Circuits App</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="home__packages_pack">
                <div class="row-fluid">
                    <div class="column one-third">
                        <img class="img-responsive" src="http://placehold.it/200x200"/>
                    </div>
                    <div class="column two-thirds">
                        <h2>Biology</h2>
                        <p>
                            Discover cells, viruses, and the microscopic world!
                        </p>
                        <p>
                            Includes:
                        </p>
                        <ul>
                            <li>Learning Book</li>
                            <li>Lab Experiments Book</li>
                            <li>Cells and Viruses App</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="home__packages_pack">
                <div class="row-fluid">
                    <div class="column one-third">
                        <img class="img-responsive" src="http://placehold.it/200x200"/>
                    </div>
                    <div class="column two-thirds">
                        <h2>Chemistry</h2>

                        <p>
                            Learn about the building blocks of all matter!
                        </p>
                        <p>
                            Includes:
                        </p>
                        <ul>
                            <li>Learning Book</li>
                            <li>Lab Experiments Book</li>
                            <li>Atoms and Molecules App</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="home__packages_pack">
                <div class="row-fluid">
                    <div class="column one-third">
                        <img class="img-responsive" src="http://placehold.it/200x200"/>
                    </div>
                    <div class="column two-thirds">
                        <h2>Programming</h2>

                        <p>
                            Piece together games and other software!
                        </p>
                        <p>
                            Includes:
                        </p>
                        <ul>
                            <li>Learning Book</li>
                            <li>Flashcards</li>
                            <li>Atoms and Molecules App</li>
                        </ul>
                    </div>
                </div>
            </div>
            <p>And more Paugme Packs are on their way!</p>
        </div>

        <div class="home__signup">
            <h3>Get a new Paugme Pack delivered to you every month!</h3>
            @include('home._sign-up-form')
        </div>

        <div class="home__circuits">
            <h2>Start Building Circuits</h2>

            <div class="home__circuit row row-same-height">
                <div class="home__circuit_light column-xs one-third">
                    <div class="fa fa-lightbulb-o">
                    </div>
                </div>
                <div class="home__circuit_light_text column-xs two-thirds">
                    <p>Our circuits pack teaches how circuits work.</p>
                </div>
            </div>
            <div class="home__circuit row row-same-height">
                <div class="home__circuit_circuit column-xs one-third hidden-md hidden-lg hidden-xl">
                    <!-- Circuit -->
                    <div class="fa fa-mobile">
                    </div>
                </div>
                <div class="home__circuit_circuit_text column-xs two-thirds">
                    <p>Learn about logic gates and how to store data. We even provide
                    additional activities, like how to build motion sensing circuits.</p>
                </div>
                <div class="home__circuit_circuit column-xs one-third hidden-xs">
                    <!-- Circuit -->
                    <div class="fa fa-mobile">
                    </div>
                </div>
            </div>
            <div class="home__circuit row row-same-height">
                <div class="home__circuit_mobile column-xs one-third">
                    <div class="fa fa-mobile">
                    </div>
                </div>
                <div class="home__circuit_mobile_text column-xs two-thirds">
                    <p>Build and experiment using our app for iPads, iPhones, and Android devices!</p>
                </div>
            </div>

        </div>
        <div class="home__biology">
            <h2>Discover Biology</h2>

            <div class="row">
                <div class="column-xs one-half">
                    <img src="http://placehold.it/200x200" />

                    <h3>Cells</h3>
                    <p>Learn about animal cells and plant cells
                        and how they differ from each other</p>
                </div>
                <div class="column-xs one-half">
                    <img src="http://placehold.it/200x200" />

                    <h3>Ecology</h3>
                    <p>Find out how organisms are related to one another</p>
                </div>
            </div>
            <div class="row">
                <div class="column-xs one-half">
                    <img src="http://placehold.it/200x200" />

                    <h3>Plants</h3>
                    <p>Find out what makes a plant a plant and how photosynthesis works</p>
                </div>
                <div class="column-xs one-half">
                    <img src="http://placehold.it/200x200" />


                    <h3>Viruses and Bacteria</h3>
                    <p>Investigate illnesses and what causes them!</p>
                </div>
            </div>
        </div>
        <div class="home__rest">
            <h2>Coming Soon!</h2>
            <div class="row">
                <div class="column-xs one-half">
                    <h3>Chemistry</h3>

                    <span class="home__rest_icon fa fa-flask"></span>

                </div>
                <div class="column-xs one-half">
                    <h3>Programming</h3>

                    <span class="home__rest_icon fa fa-code"></span>
                </div>
            </div>
        </div>
        <div class="home__signup">
            <h3 class="text-center">A new subject every month!</h3>
            @include('home._sign-up-form')
        </div>
        <div class="home__share">
            @include('home._share')
        </div>
    </div>
@stop

@section('scripts')
    <script src="js/home.js"></script>
@stop