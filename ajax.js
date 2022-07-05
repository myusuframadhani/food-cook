$(document).ready(function () {
  //!! >>> MENAMBAHKAN DATA KE DB <<<
  $("#save").click(function () {
    $judul = $("#judul").val();
    $tipemakanan = $("#id_tipe_makanan").val();
    $bahan_baku = $("#id_bahan_baku").val();
    $komposisi = $("#komposisi").val();
    $tutorial = $("#cara_masak").val();
    $gambar = $("#thumbnail").val();
    $video = $("#link_video").val();

    $.ajax({
      url: "insert.php",
      method: "POST",
      data: {
        judul: $judul,
        id_tipe_makanan: $tipemakanan,
        id_bahan_baku: $bahan_baku,
        komposisi: $komposisi,
        cara_masak: $tutorial,
        thumbnail: $gambar,
        link_video: $video,
      },
      success: function (_) {
        $("#insertModal").modal("hide");
        $.ajax({
          url: "select.php",
          success: function (val) {
            $("#content").html(val);
          },
        });
        document.getElementById("judul").value = "";
        document.getElementById("id_tipe_makanan").value = "";
        document.getElementById("id_bahan_baku").value = "";
        document.getElementById("komposisi").value = "";
        document.getElementById("cara_masak").value = "";
        document.getElementById("thumbnail").value = "";
        document.getElementById("link_video").value = "";
      },
    });
  });

  load();

  //!! >>> MENGUBAH DATA LEWAT CARD<<<

  $("#update").click(function () {
    $id_resep = $("#id_resep_up").val();
    $judul = $("#judul_up").val();
    $tipemakanan = $("#id_tipe_makanan_up").val();
    $bahan_baku = $("#id_bahan_baku_up").val();
    $komposisi = $("#komposisi_up").val();
    $tutorial = $("#cara_masak_up").val();
    $gambar = $("#thumbnail_up").val();
    $video = $("#link_video_up").val();

    $.ajax({
      url: "update.php",
      method: "POST",
      data: {
        id_resep: $id_resep,
        judul: $judul,
        id_tipe_makanan: $tipemakanan,
        id_bahan_baku: $bahan_baku,
        komposisi: $komposisi,
        cara_masak: $tutorial,
        thumbnail: $gambar,
        link_video: $video,
      },
      success: function (_) {
        $("#updatedata").modal("hide");
        $.ajax({
          url: "select.php",
          success: function (val) {
            $("#content").html(val);
          },
        });
        document.getElementById("id_resep").value = "";
        document.getElementById("judul").value = "";
        document.getElementById("id_tipe_makanan").value = "";
        document.getElementById("id_bahan_baku").value = "";
        document.getElementById("komposisi").value = "";
        document.getElementById("cara_masak").value = "";
        document.getElementById("thumbnail").value = "";
        document.getElementById("link_video").value = "";
      },
    });
  });

  load();

  $(document).on("click", "#editbutton", function () {
    var id_resep = $(this).attr("id-resep");
    var judul = $(this).attr("judul");
    var id_tipe_makanan = $(this).attr("tipe-makanan");
    var id_bahan_baku = $(this).attr("bahan-baku");
    var komposisi = $(this).attr("komposisi");
    var tutorial = $(this).attr("tutorial");
    var gambar = $(this).attr("gambar");
    var video = $(this).attr("video");
    $("#id_resep_up").val(id_resep);
    $("#judul_up").val(judul);
    $(`#id_tipe_makanan_up option[value=${id_tipe_makanan}]`).attr(
      "selected",
      "selected"
    );
    $(`#id_bahan_baku_up option[value=${id_bahan_baku}]`).attr(
      "selected",
      "selected"
    );
    $("#komposisi_up").val(komposisi);
    $("#cara_masak_up").val(tutorial);
    $("#thumbnail_up").val(gambar);
    $("#link_video_up").val(video);
  });

  //!! >>> MENGAMBIL DATA DARI DB <<<
  function load(query) {
    $.ajax({
      url: "select.php",
      method: "POST",
      data: { query: query },
      success: function (data) {
        $("#content").html(data);
      },
    });
  }
  $("#search_text").keyup(function () {
    var search = $(this).val();
    if (search != "") {
      load(search);
    } else {
      load();
    }
  });

  //!! >>> SORT JUDUL A - Z <<<
  $("#AZ").click(function () {
    $.ajax({
      url: "select.php",
      method: "POST",
      data: { sort: "asc" },
      success: function (data) {
        $("#content").html(data);
      },
    });
  });
  //!! >>> SORT JUDUL Z - A <<<
  $("#ZA").click(function () {
    $.ajax({
      url: "select.php",
      method: "POST",
      data: { sort: "dsc" },
      success: function (data) {
        $("#content").html(data);
      },
    });
  });

  //!! >>> SORT BAHAN BAKU A - Z <<<
  $("#bahanAZ").click(function () {
    $.ajax({
      url: "select.php",
      method: "POST",
      data: { sort: "bahanasc" },
      success: function (data) {
        $("#content").html(data);
      },
    });
  });
  //!! >>> SORT BAHAN BAKU Z - A <<<
  $("#bahanZA").click(function () {
    $.ajax({
      url: "select.php",
      method: "POST",
      data: { sort: "bahandsc" },
      success: function (data) {
        $("#content").html(data);
      },
    });
  });

  //!! >>> SORT TIPE MAKANAN A - Z <<<
  $("#tipeAZ").click(function () {
    $.ajax({
      url: "select.php",
      method: "POST",
      data: { sort: "tipeasc" },
      success: function (data) {
        $("#content").html(data);
      },
    });
  });
  //!! >>> SORT TIPE MAKANAN Z - A <<<
  $("#tipeZA").click(function () {
    $.ajax({
      url: "select.php",
      method: "POST",
      data: { sort: "tipedsc" },
      success: function (data) {
        $("#content").html(data);
      },
    });
  });

  //!! >>> PAGINATION LOAD MORE <<<
  var halaman = 6;
  $("#load-menu").click(function () {
    $.ajax({
      url: "select.php",
      method: "POST",
      data: { load: halaman },
      success: function (data) {
        $("#content").html(data);
        halaman += 6;
      },
    });
  });
});
