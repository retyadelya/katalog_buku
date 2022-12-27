<?php
if(isset($_GET['data'])){
  $id_blog = $_GET['data'];
}
?>
    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">BLOG</h1>
      </div>
    </section><br><br>
    <section id="blog-list">
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-9 blog-main">
            <div class="blog-post">
              <?php
              $sql = "SELECT `b`.`id_blog`, `k`.`kategori_blog`, `b`.`judul`, `b`.`tanggal`, `u`.`nama`, `b`.`isi` FROM `blog` `b` 
              INNER JOIN `kategori_blog` `k` ON `b`.`id_kategori_blog` = `k`.`id_kategori_blog` 
              INNER JOIN `user` `u` ON `b`.`id_user` = `u`.`id_user` WHERE `b`.`id_blog` = '$id_blog'";
              $query = mysqli_query($koneksi, $sql);
              while($data = mysqli_fetch_row($query)){
                $id_blog = $data[0];
                $kategori_blog = $data[1];
                $judul = $data[2];
                $tanggal = $data[3];
                $nama = $data[4];
                $isi = $data[5];
              }
              ?>
              <h2 class="blog-post-title"><?php echo $judul;?></h2>
              <p class="blog-post-meta"><?php echo $tanggal;?><br><a href="#"><?php echo $nama?></a></br></p>

              <p><?php echo $isi;?></p>
            </div><br><br><!-- /.blog-post -->
          </div><!-- /.blog-main -->
      
          <aside class="col-md-3 blog-sidebar">
      
            <div class="p-4">
              <h4 class="font-italic">Categories</h4>
              <ol class="list-unstyled mb-0">
                <li><a href="#">Umum</a></li>
                <li><a href="#">PHP</a></li>
                <li><a href="#">Java</a></li>
                <li><a href="#">Database</a></li>
                <li><a href="#">Techno</a></li>
            </div>
      
            <div class="p-4">
              <h4 class="font-italic">Archives</h4>
              <ol class="list-unstyled mb-0">
                <li><a href="#">March 2014</a></li>
                <li><a href="#">February 2014</a></li>
                <li><a href="#">January 2014</a></li>
                <li><a href="#">December 2013</a></li>
                <li><a href="#">November 2013</a></li>
                <li><a href="#">October 2013</a></li>
                <li><a href="#">September 2013</a></li>
                <li><a href="#">August 2013</a></li>
                <li><a href="#">July 2013</a></li>
                <li><a href="#">June 2013</a></li>
                <li><a href="#">May 2013</a></li>
                <li><a href="#">April 2013</a></li>
              </ol>
            </div>
      
            
          </aside><!-- /.blog-sidebar -->
      
        </div><!-- /.row -->
      
      </main><!-- /.container -->
    </section><br><br>
</html>