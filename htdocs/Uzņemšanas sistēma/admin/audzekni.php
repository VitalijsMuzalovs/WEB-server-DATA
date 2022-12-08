<?php
    $page = "audzekni";
    require "header.php"
?>
<section class="admin">
    <div class="kopsavilkums">
        <div class="informacija">
            <span>13</span>
            <h3>Jauni pieteikumi</h3>
            <p>Pēdējo 24h laikā</p>
        </div>
        <div class="informacija">
            <span>7</span>
            <h3>Iesniegti dokumenti</h3>
            <p>Pēdējo 24h laikā</p>
        </div>
        <div class="informacija">
            <span>350</span>
            <h3>Pieteikumu kopā</h3>
            <p>Kopš uzņemšanas sākuma</p>
        </div>
        <div class="informacija">
            <span>205</span>
            <h3>Iesniegti dokumenti</h3>
            <p>Kopumā no visiem pieteikumiem</p>
        </div>
    </div>

    <div class="row">
        <div class="info">
            <div class="head-info">Pēdējās izmaiņas sistēmā:</div>
            <table>
                <tr><th>Audzēknis</th><th>Specialitāte</th><th>Statuss</th></tr>
                <tr><td>Jānis Bērziņš</td><td>Pavārs</td><td>Procesā</td></tr>
                <tr><td>Jānis Bērziņš</td><td>Pavārs</td><td>Procesā</td></tr>
                <tr><td>Jānis Bērziņš</td><td>Pavārs</td><td>Procesā</td></tr>
                <tr><td>Jānis Bērziņš</td><td>Pavārs</td><td>Procesā</td></tr>
                <tr><td>Jānis Bērziņš</td><td>Pavārs</td><td>Procesā</td></tr>
            </table>
        </div>
        <div class="info2">
            <div class="head-info">Pieprasītākās specialitātes:</div>
            <table>
                <tr><th>Specialitāte</th><th>Pieteikumi</th></tr>
                <tr><td>Programmēšanas tehniķis</td><td>76</td></tr>
                <tr><td>Datorisistēmu tehniķis</td><td>28</td></tr>
                <tr><td>Pavārs</td><td>26</td></tr>
                <tr><td>Mehatronisku sistēmu tehniķis</td><td>25</td></tr>
                <tr><td>Grāmatvedis</td><td>25</td></tr>
            </table>
        </div>
    </div>
</section>

<?php
    include "footer.php"
?>