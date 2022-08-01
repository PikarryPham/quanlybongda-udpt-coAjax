const url = $(location).attr("pathname");

function handleGetPathName(url) {
  const words = url.split("/");
  return words[2] + "/" + words[3];
}

const pathname = handleGetPathName(url);

console.log(pathname);

switch (pathname) {
  case "players/index":
    var checkedbox = document.getElementsByClassName("m-checkbox");
    var checkboxall = document.getElementById("checkboxall");
    var allPlayers = document.getElementById("all-player");
    var clickdelete = document.getElementById("btnDelete");
    var page_group = document.getElementById("page-group");

    var ids = [];
    var number_show = 10;
    var page = 1;
    var data_response = [];

    // Thay đổi nút ấn
    function resetButton(all) {
      var total_pages = Math.ceil(all / number_show);
      var start_page = 1;
      var end_page = total_pages;
      var temp = 0;
      if (page > 5) {
        start_page = page - 5;
      } else {
        temp = 5 - page;
      }
      if (total_pages - 5 > page) {
        end_page = page + 5 + temp;
      } else if (total_pages > 10) {
        start_page = total_pages - 10;
      }
      console.log(start_page);
      page_group.innerHTML = "";
      for (var i = start_page; i < page; i++) {
        page_group.innerHTML += `<button button class='page-number' onclick="change_page(${i})">${i}</button>`;
      }
      page_group.innerHTML += `<button button class='page-number selected'>${page}</button>`;
      for (var i = page + 1; i <= end_page; i++) {
        page_group.innerHTML += `<button button class='page-number' onclick="change_page(${i})">${i}</button>`;
      }
      document
        .getElementById("end-page")
        .setAttribute("onclick", "change_page(" + total_pages + ")");

      if (page != end_page) {
        document
          .getElementById("next-page")
          .setAttribute("onclick", "change_page(" + (page + 1) + ")");
      } else {
        document
          .getElementById("next-page")
          .setAttribute("onclick", "change_page(" + total_pages + ")");
      }
      if (page != 1) {
        document
          .getElementById("pre-page")
          .setAttribute("onclick", "change_page(" + (page - 1) + ")");
      } else {
        document
          .getElementById("pre-page")
          .setAttribute("onclick", "change_page(1)");
      }
    }

    // // Số lượng dc show
    document
      .getElementById("number-number-show")
      .addEventListener("change", function (e) {
        document.getElementById("number-player").value = e.target.value;
        number_show = e.target.value;
      });

    // multy delete

    function newCheck() {
      ids = [];
      for (var c of checkedbox) {
        c.addEventListener("change", function () {
          if (this.checked == true) {
            console.log(this.value);
            ids.push(this.value);
          } else {
            ids = ids.filter((e) => e !== this.value);
            checkboxall.checked = false;
            ids = ids.filter((e) => e !== "0");
          }
        });
      }
      console.log(ids);
    }
    // end multy delete

    // one delete
    function oneDelete() {
      $(".delete-one-value").on("click", function (e) {
        e.preventDefault();
        var url_link = this.href;
        $.ajax({
          type: "GET",
          url: url_link,
          success: function (response) {
            var temp = page;
            document.getElementById("submit-button").click();
            page = temp;
            changePlayer(data_response);
          },
        });
        this.parentNode.parentNode.remove();
      });
    }
    // end one delete

    checkboxall.addEventListener("change", function () {
      ids = [];
      if (this.checked == true) {
        for (var c of checkedbox) {
          c.checked = true;
          ids.push(c.value);
        }
      } else {
        for (var c of checkedbox) {
          c.checked = false;
        }
      }
    });

    function doneDelete() {
      checkboxall.checked = false;
      for (var i = 0; i < ids.length; i++) {
        if (ids[i] == 0) {
          allPlayers.innerHTML = "<div> <h2>Không có cầu thủ nào !</h2></div>";
          break;
        }
        var id_delete = "data-player-" + ids[i];
        document.getElementById(id_delete).remove();
      }
    }

    // change page
    function change_page(new_page) {
      page = new_page;
      changePlayer(data_response);
    }
    e;

    function changePlayer(data = []) {
      allPlayers.innerHTML = "";
      checkboxall.checked = false;
      if (data.length == 0) {
        allPlayers.innerHTML =
          "<div> <h2>Không có cầu thủ nào mà bạn tìm kiếm!</h2></div>";
      } else {
        for (var i = (page - 1) * number_show; i < page * number_show; i++) {
          if (data[i] == null) {
            break;
          }
          allPlayers.innerHTML += `
            <tr id="data-player-${data[i]["PlayerID"]}">
                <td class="text-align-center">
                <input value="${data[i]["PlayerID"]}" type="checkbox" class="m-checkbox" name="playerid[]" />
                </td>
    
                <td class="text-align-center">${data[i]["FullName"]}</td>
    
                <td class="text-align-center">
                ${data[i]["ClubName"]}
                </td>
                <td class="text-align-center">
                ${data[i]["Position"]}
    
                </td>
                <td class="text-align-center">
                ${data[i]["DOB"]}
    
                </td>
                <td class="text-align-center">
                ${data[i]["Nationality"]}
    
    
                </td>
                <td class="text-align-center">
                ${data[i]["Number"]}
    
                </td>
    
                <td class="text-align-center">
                <a href="./edit/${data[i]["PlayerID"]}"> <i style=" margin-right: 5px ; color:#33FFFF" class="icon1 fa-solid fa-pen-to-square"></i></a>
                <a class="delete-one-value" href="./delete/${data[i]["PlayerID"]}"> <i style="color:red" class="icon1 fa-solid fa-trash-can"></i></a>
            </td>
            `;
        }
      }
      newCheck();
      oneDelete();
      resetButton(data.length);
    }

    $(document).ready(function () {
      document
        .getElementById("form-find-player")
        .addEventListener("submit", function (event) {
          event.preventDefault();
          page = 1;
          const form = $(this);
          $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: form.serialize(),
            dataType: "json",
            success: function (response) {
              data_response = response;
              changePlayer(data_response);
            },
          });
        });
      document.getElementById("submit-button").click();
      oneDelete();
      newCheck();
    });

    clickdelete.addEventListener("click", function () {
      console.log(window.location.hostname == "localhost");

      if (window.location.hostname == "localhost") {
        var link_url =
          window.location.hostname +
          "/" +
          window.location.pathname.split("/")[1] +
          "/Players/multydelete/" +
          ids;
      } else {
        var link_url = window.location.hostname + "/Players/multydelete/" + ids;
      }
      link_url = window.location.protocol + "//" + link_url;
      console.log(link_url);
      $.ajax({
        type: "GET",
        url: link_url,
        dataType: "html",
        success: function (response) {
          doneDelete();
          ids = [];
          var temp = page;
          document.getElementById("submit-button").click();
          page = temp;
          changePlayer(data_response);
        },
      });
    });

    break;
  case "players/create":
    const addPlayerButton = document.getElementById("add-new-player");
    addPlayerButton.addEventListener("click", function (event) {
      const addForm = $("#add-new-player-form");
      //
      var hovaten = $("#id-name-add-form").val();
      var DOB = $("#id-DOB-add-form").val();
      var club = $("#id-club-add-form").val();
      var position = $("#id-position-add-form").val();
      var national = $("#id-national-add-form").val();
      var number = $("#id-number-add-form").val();

      $.ajax({
        url: addForm.attr("action"),
        type: "POST",
        // dataType: "json", // data type
        // data: addForm.serialize(),
        data: {
          hovaten: hovaten,
          DOB: DOB,
          club: club,
          position: position,
          national: national,
          number: number,
        },
        success: function (data) {
          window.location.href = "/manager-football/players/index";
        },
        error: function (xhr, resp, text) {
          console.log(xhr, resp, text);
        },
      });
    });
    break;
  case "clubs/create":
    const addClubButton = document.getElementById("add-club-btn");

    addClubButton.addEventListener("click", function (event) {
      event.preventDefault();
      const clubForm = $("#club-form");
      const name = $("#club-form input[name='name']").val();
      const shortname = $("#club-form input[name='shortname']").val();
      const stadiumid = $("#club-form select[name='stadiumid']").val();
      const coachid = $("#club-form select[name='coachid']").val();

      const data = {
        name,
        shortname,
        stadiumid,
        coachid
      }

      $.ajax({
        url: clubForm.attr("action"),
        type: "POST",
        data,
        success: function (data) {
          window.location.href = "/manager-football/clubs/index";
        },
        error: function (xhr, resp, text) {
          console.log(xhr, resp, text);
        },
      });
    });
  case "/Clubs/update":
    const editClubButton = document.getElementById("edit-club-btn");
    editClubButton.addEventListener("click", function (event) {
      const eidtForm = $("#edit-new-player-form");
      //
      var ClubName = $("#ClubName-edit-form").val();
      var Shortname = $("#Shortname-edit-form").val();
      var StadiumID = $("#StadiumID-edit-form").val();
      var coachid = $("#coachid-edit-form").val();

      $.ajax({
        url: eidtForm.attr("action"),
        type: "POST",
        // dataType: "json", // data type
        // data: addForm.serialize(),
        data: {
          ClubName: ClubName,
          Shortname: Shortname,
          StadiumID: StadiumID,
          coachid: coachid,
          
        },
        success: function (data) {
          window.location.href = "/manager-football/club/edit";
        },
        error: function (xhr, resp, text) {
          console.log(xhr, resp, text);
        },
      });
    });
    break;
    
}
