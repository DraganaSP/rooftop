<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>ADMIN PANEL ROOFTOP</title>
    <style>
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="jumbotron">
            <h3>Одбери</h3>
            <p>Во зависност од твоите потреби одбери дали креираш понуда или фактура</p>
        </div>
    </div>
    <div class="container">
        <div class="row">

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab">
                    <button class="tablinks" id='ponudiTab' onclick="openCity(event, 'ponudi')">ПОНУДИ</button>
                    <button class="tablinks" onclick="openCity(event, 'fakturi')">ФАКТУРИ</button>
                </div>
                <div class="tabcontent" id="ponudi">
                    <div class="table-responsive">
                        <table class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th>Ставка</th>
                                    <th>Должно метро или м2</th>
                                    <th>Вредност</th>
                                    <th>Цена</th>
                                    <th>Вкупно</th>
                                    <th>Избриши</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id='1'>
                                    <td>
                                        <input type="text" class='form-control' name='name' id='name'>
                                    </td>
                                    <td>
                                        <select class="form-control select" name="select">
                                            <option value="metro">Должно метро</option>
                                            <option value="kvadrat">Квадратен метар</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input class="form-control value" type='number'>
                                    </td>
                                    <td>
                                        <input type='number' class='form-control price'>
                                    </td>
                                    <td class='total text-center'></td>
                                    <td>
                                        <button class='btn btn-danger delete' data-id='1'>Избриши</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button class='btn btn-primary' id='addRow'>Додади ред</button>
                    <button class='btn btn-info'>Пресметај</button>
                    <button class='btn btn-success' id='save'>Зачувај</button>
                    <button class='btn btn-warning'>Испрати по е-маил</button>
                </div>

                <div class="tabcontent" id="fakturi">
                    <p>Home tab content ...</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        //   evt.currentTarget.className += " active";
    }
    $(document).ready(function() {

        $('#ponudiTab').click();

        $('#addRow').on('click', () => {
            let counter = $('.table tr').length;
            let html = `<tr id='${counter}'>
                            <td>
                                <input type="text" class='form-control' name='name' id='name'>
                            </td>
                            <td>
                                <select name="select" class="select form-control">
                                    <option value="metro">Должно метро</option>
                                    <option value="kvadrat">Квадратен метар</option>
                                </select>
                            </td>
                            <td>
                                <input type='number' class='value form-control'>
                            </td>
                            <td>
                                <input type='number' class='price form-control'>
                            </td>
                            <td class='total text-center'></td>
                            <td>
                                <button class='btn btn-danger delete' data-id='${counter}'>Избриши</button>
                            </td>
                        </tr>`
            $('.table tbody').append(html)
        })

        $('#save').on('click', () => {
            //ajax do baza zachuvaj ponuda
        })

        $(document).on('change', '.value', (e) => {
            let total = 0;
            let id = e.target.parentNode.parentNode.getAttribute('id');
            if ($(`#${id}`).children('td').children('.price').val()) {
                total = $(`#${id}`).children('td').children('.value').val() * $(`#${id}`).children('td')
                    .children('.price').val();
                $(`#${id}`).children('.total').text(total);
            }
        })

        $(document).on('change', '.price', (e) => {
            let total = 0;
            let id = e.target.parentNode.parentNode.getAttribute('id');
            if ($(`#${id}`).children('td').children('.value').val()) {
                total = $(`#${id}`).children('td').children('.price').val() * $(`#${id}`).children('td')
                    .children('.value').val();
                $(`#${id}`).children('.total').text(total);
            }
        })

        $(document).on('click', '.delete', (e) => {
            let id = e.target.getAttribute('data-id'); 
            $('tbody').find(`tr#${id}`).remove();
        })
    });
    </script>
</body>

</html>