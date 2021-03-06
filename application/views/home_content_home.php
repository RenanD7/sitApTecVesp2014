<!-- Content -->
<div id="content">
    <div class="inner">

        <!-- Post -->
        <article class="box post post-excerpt">
            <header>
                <!--
                        Note: Titles and subtitles will wrap automatically when necessary, so don't worry
                        if they get too long. You can also remove the <p> entirely if you don't
                        need a subtitle.
                -->
                <h2><a href="#">Cadastro de Usuário</a></h2>
                <!-- <p>A free, fully responsive HTML5 site template by HTML5 UP</p>-->
            </header>
            <div class="info">
                <!--
                        Note: The date should be formatted exactly as it's shown below. In particular, the
                        "least significant" characters of the month should be encapsulated in a <span>
                        element to denote what gets dropped in 1200px mode (eg. the "uary" in "January").
                        Oh, and if you don't need a date for a particular page or post you can simply delete
                        the entire "date" element.
                        
                -->
                <!--<span class="date"><span class="month">Jul<span>y</span></span> <span class="day">14</span><span class="year">, 2014</span></span>-->
                <!--
                        Note: You can change the number of list items in "stats" to whatever you want.
                -->
                <!--
                <ul class="stats">
                    <li><a href="#" class="icon fa-comment">16</a></li>
                    <li><a href="#" class="icon fa-heart">32</a></li>
                    <li><a href="#" class="icon fa-twitter">64</a></li>
                    <li><a href="#" class="icon fa-facebook">128</a></li>
                </ul>
                -->
            </div><!-- Info-->
            <?php
            if (!defined('BASEPATH'))
                exit('No direct script access allowed');
            session_start(); //we need to call PHP's session object to access it through CI

            class Home extends CI_Controller {

                function __construct() {
                    parent::__construct();
                }

                function index() {
                    if ($this->session->userdata('logged_in')) {
                        $session_data = $this->session->userdata('logged_in');
                        $data['nome'] = $session_data['nome'];
                        $this->load->view('home_view', $data);
                    } else {
                        //If no session, redirect to login page
                        redirect('login', 'refresh');
                    }
                }

                function logout() {
                    $this->session->unset_userdata('logged_in');
                    session_destroy();
                    redirect('home', 'refresh');
                }

            }
            ?>
        </article>


        <!-- Pagination -->

        <div class="pagination">
            <!--<a href="#" class="button previous">Previous Page</a>-->
            <!--
            <div class="pages">
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <span>&hellip;</span>
                <a href="#">20</a>
            </div>
            <a href="#" class="button next">Next Page</a>
            -->
        </div><!-- Pagination -->
    </div><!-- Inner -->
</div><!-- Content -->
