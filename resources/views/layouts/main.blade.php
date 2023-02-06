<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>@yield('title')</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <!-- Project CSS -->
        <link rel="stylesheet" href="/css/styles.css">

        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/niceventslogo.png" alt="nicEvents">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link">Criar Evento</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">Meus Eventos</a>
                            </li>
                            <li class="nav-item">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <a href="/logout" class="nav-link" 
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        Sair
                                    </a>
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a href="/login" class="nav-link">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a href="/register" class="nav-link">Cadastrar</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <p class="success">{{ session('success') }}</p>
                    </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        <footer class="text-center text-lg-start text-dark">
            <section class="d-flex justify-content-between p-3 text-white" style="background-color: #ff5c5c;">
                <div class="mr-5">
                    <span>Conecte-se conosco nas redes sociais:</span>
                </div>
                <div>
                    <a href="" class="text-white mr-4">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="text-white mr-4">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="text-white mr-4">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="text-white mr-4">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="text-white mr-4">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="text-white mr-4">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </section>
            <section>
                <div class="container text-center text-md-start mt-5">
                    <div class="row mt-3">
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold">NicEvents</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 3.75rem; background-color: #69cdff; height: 0.125rem">
                            <p>
                                Somos uma empresa responsável por organizar eventos 
                                para todo o país, sempre matendo o propósito do 
                                seu evento como nosso principal objetivo.
                            </p>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 services">
                            <h6 class="text-uppercase fw-bold">Serviços</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 3.75rem; background-color: #69cdff; height: 0.125rem">
                            <p>
                                <a href="#!" class="text-dark">Organizar eventos</a>
                            </p>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 useful-links">
                            <h6 class="text-uppercase fw-bold">Links úteis</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 3.75rem; background-color: #69cdff; height: 0.125rem">
                            <p>
                                <a href="#!" class="text-dark">Link exemplo 1</a>
                            </p>
                            <p>
                                <a href="#!" class="text-dark">Link exemplo 2</a>
                            </p>
                            <p>
                                <a href="#!" class="text-dark">Link exemplo 3</a>
                            </p>
                        </div>
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <h6 class="text-uppercase fw-bold">Contato</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 3.75rem; background-color: #69cdff; height: 0.125rem">
                            <p class="text-left"><i class="fas fa-home mr-3"></i>Endereço exemplo, 2222</p>
                            <p class="text-left"><i class="fas fa-envelope mr-3"></i>@example.com</p>
                            <p class="text-left"><i class="fas fa-phone mr-3"></i>(99)99999-8888</p>
                        </div>
                    </div>
                </div>
            </section>
            <div class="text-center p-3 copyright">
                <p id="p-nicevents">&copy; 2023 Copyright: NicEvents</p>
            </div>
        </footer>
        
        {{-- Ionicons --}}
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://kit.fontawesome.com/075cada2e7.js" crossorigin="anonymous"></script>

        {{-- JS Files --}}
        <script src="/js/cardsSpacing.js"></script>
    </body>
</html>
