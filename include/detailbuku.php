<?php
if(isset($_GET['data'])){
  $id_buku = $_GET['data'];
}
?>
    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">DETAIL KATALOG</h1>
      </div>
    </section><br><br>
    <section id="katalog-wrapper">
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-9 katalog-detail">
            <div class="table-responsive">
              <table class="table table-bordered">
                <?php 
                  $sql_d = "SELECT `b`.`cover`,`k`.`kategori_buku`,`b`.`judul`,
                  `b`.`pengarang`, `b`.`tahun_terbit`,`p`.`penerbit`, `b`.`sinopsis`, 
                  `b`.`id_kategori_buku` FROM `buku` `b`
                  INNER JOIN `kategori_buku` `k` ON `b`.`id_kategori_buku`=`k`.`id_kategori_buku`
                  INNER JOIN `penerbit` `p` ON `b`.`id_penerbit`= `p`.`id_penerbit`
                  WHERE `b`.`id_buku`='$id_buku'";
                  $query_d = mysqli_query($koneksi,$sql_d);
                  while($data_d = mysqli_fetch_row($query_d)){
                    $cover = $data_d[0];
                    $kategori_buku = $data_d[1];
                    $judul_buku = $data_d[2];
                    $pengarang = $data_d[3];
                    $tahun_terbit = $data_d[4];
                    $penerbit = $data_d[5];
                    $sinopsis = $data_d[6];
                    $id_kategori_buku = $data_d[7];
                  
                    //get tag
                    $array_idtag = array();
                    $array_tag = array();
                    $sql_tb = "SELECT `tb`.`id_tag`, `t`.`tag` from `tag_buku` `tb`
                    inner join `tag` `t`  ON  `tb`.`id_tag` = `t`.`id_tag` 
                    where `tb`.`id_buku`='$id_buku'";
                    $query_tb = mysqli_query($koneksi,$sql_tb);
                    while($data_tb = mysqli_fetch_row($query_tb)){
                          $array_idtag[] = $data_tb[0];
                          $array_tag[] = $data_tb[1];
                    }
                                    
                    ?>
                    <tr>
                      <td width="40%" rowspan="6">
                      <img src="admin/cover/<?php echo $cover;?>" class="img-fluid" 
                      alt="<?php echo $judul_buku;?>" 
                        title="<?php echo $judul_buku;?>"></td>
                        <td colspan="2"><h4><?php echo $judul_buku;?></h4></td>
                      </tr>
                      <tr>
                        <td width="17%"><strong>Penulis</strong></td>
                        <td width="43%"><?php echo $pengarang;?></td>
                      </tr>
                      <tr>
                        <td><strong>Penerbit</strong></td>
                        <td><?php echo $penerbit;?></td>
                      </tr>
                      <tr>
                        <td><strong>Tahun Terbit</strong></td>
                        <td><?php echo $tahun_terbit;?></td>
                      </tr>
                      <tr>
                        <td><strong>Kategori Buku</strong></td>
                        <td><?php echo $kategori_buku;?></td>
                      </tr>
                      <tr>
                        <td><strong>Tag</strong></td>
                        <td>
                            <?php 
                              if(!empty($array_tag)){
                                $jumlah_tag = count($array_tag);
                                for($i=0;$i<$jumlah_tag;$i++){
                                  if($i==($jumlah_tag-1)){ ?>
                                      <a href="index.php?inclide=daftar-buku-tag&
                                      <?php echo $array_idtag[$i];?>">
                                      <?php echo $array_tag[$i];?></a>
                                  <?php
                                  }else{ ?>
                                      <a href="index.php?inclide=daftar-buku-tag&
                                      <?php echo $array_idtag[$i];?>">
                                      <?php echo $array_tag[$i];?></a>,
                                  <?php 
                                  }
                                  ?>
                              <?php }}?>
                          </td>
                      </tr>
                      <tr>
                          <td colspan="3">
                            <h5>Sinopsis</h5>
                            <p><?php echo $sinopsis;?></p>
                          </td>
                      </tr>
                    <?php }?>
              </table>
            </div><!-- .table-responsive -->

          </div><!-- /.blog-main -->
      
          <aside class="col-md-3 katalog-sidebar">
      
            
           <div class="pl-4 pb-4">
              <h4 class="font-italic">Buku Terkait</h4>
              <ol class="list-unstyled mb-0">
                <li><a href="#">Data Mining</a></li>
                <li><a href="#">Implementasi Neural Network</a></li>
                <li><a href="#">Deep Learning untuk Machine Learning</a></li>
                <li><a href="#">Python untuk Machine Learning</a></li>
              </ol>
            </div>

            <div class="pl-4 pb-4">
              <h4 class="font-italic">Categories</h4>
              <ol class="list-unstyled mb-0">
                <li><a href="#">Umum</a></li>
                <li><a href="#">PHP</a></li>
                <li><a href="#">Java</a></li>
                <li><a href="#">Database</a></li>
                <li><a href="#">Techno</a></li>
            </div>
      
            <div class="p-4">
              <h4 class="font-italic">Tag</h4>
              <ol class="list-unstyled">
                <li><a href="#">PHP</a></li>
                <li><a href="#">MySQL</a></li>
                <li><a href="#">Javascript</a></li>
              </ol>
            </div>
          </aside><!-- /.blog-sidebar -->
      
        </div><!-- /.row -->
      
      </main><!-- /.container -->
    </section><br><br>

</html>