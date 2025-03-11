<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/sass/section-indication.scss')
    <title>Document</title>
</head>
<body>
    @include('include.nav')
    <div class="container" style="width: 800px; text-align: center; padding: 20px;">
        @yield('content')
    </div>
    <div class="body-nav" style="margin-top: -20px">
        @yield('navigation')
        @yield('statistic')
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const typeElement = document.querySelector(".u-text-1");
            const statisticElement = document.querySelector(".u-text-2");

            // Проверяем, есть ли сохранённые значения и восстанавливаем их
            if (localStorage.getItem("type") && localStorage.getItem("statistic")) {
                typeElement.textContent = localStorage.getItem("type");
                statisticElement.textContent = localStorage.getItem("statistic");
            }

            document.querySelectorAll(".submenu a").forEach(function (link) {
                link.addEventListener("click", function (event) {
                    event.preventDefault(); // Остановить переход по ссылке

                    let url = this.getAttribute("href"); // Получить URL

                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            let type = data.type;
                            let statistic = `CO - ${data.statistic.toFixed(2)} ppm`;

                            // Сохраняем значения в localStorage
                            localStorage.setItem("type", type);
                            localStorage.setItem("statistic", statistic);

                            // Обновляем HTML
                            typeElement.textContent = type;
                            statisticElement.textContent = statistic;
                        })
                        .catch(error => console.error("Ошибка:", error));
                });
            });
        });

    </script>

</body>
</html>
