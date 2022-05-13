@extends('layouts.master')
@section('title', 'Главная')
@section('css')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide vi" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/p3.jpg" class="d-block w-100" alt="..." style="min-height: 200px; max-height: 400px">
                <div class="carousel-caption d-none d-md-block">
                    <p class="nav-item py-2 px-4" style="background-color: white; color: black;">Полевая опытная станция с высоты птичьего полета.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/p2.jpg" class="d-block w-100" alt="..." style="min-height: 200px; max-height: 400px">
                <div class="carousel-caption d-none d-md-block">
                    <p class="nav-item py-2 px-4" style="background-color: white; color: black ;">Цветение картофеля</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/p1.jpg" class="d-block w-100" alt="..."style="min-height: 200px; max-height: 400px">
                <div class="carousel-caption d-none d-md-block">
                    <p class="nav-item py-2 px-4" style="background-color: white; color: black ;">Цветение рапса</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </button>
    </div>
    <hr style="width: 100%; height: 1px; margin-top: 50px">
    <h1 align="center">Новости</h1>
    <div style="background-color: rgba(146,204,128,0.5); border-radius: 5px;">
    @foreach($events as $event)
        @if($event->visible === 1)
        <table class="table" id="{{$event->id}}">
            <tbody>
            <tr  class="border-dark">
                <td>{{$event->created_at->format('m/d/Y')}}</td>
                <td>{{$event->created_at->format('H:i:s')}}</td>
                <td align="right"><a style="color: black"  href="javascript://" onclick="addRow('{{$event->id}}','{{$event->description}}'@if($event->href != null),'{{$event->href}}'@endif() );return false;">{{$event->name}}</a></td>
            </tr>
            </tbody>
        </table>
            <div style="background-color: white;width: 100% ; height: 15px"></div>
        @endif
        @auth
            @if($event->visible === 0)
                    <table class="table" id="{{$event->id}}">
                        <tbody>
                        <tr  class="border-dark">
                            <td>{{$event->created_at->format('m/d/Y')}}</td>
                            <td>{{$event->created_at->format('H:i:s')}}</td>
                            <td align="right"><a style="color: black"  href="javascript://" onclick="addRow('{{$event->id}}','{{$event->description}}'@if($event->href != null),'{{$event->href}}'@endif() );return false;">{{$event->name}}</a></td>
                        </tr>
                        </tbody>
                    </table>
                    <div style="background-color: white;width: 100% ; height: 15px"></div>
                @endif
            @endauth
    @endforeach
    </div>
    <script type="text/javascript">
        function addRow(id,text,href = null){
            var tbody = document.getElementById(id).getElementsByTagName("tbody")[0];
            var table = document.getElementById(id);
            var tbodyRowCount = table.tBodies[0].rows.length;
            if(tbodyRowCount <= 1){
                var row = document.createElement("tr");
                var td1 = document.createElement("td");
                td1.colSpan = "3";
                td1.appendChild(document.createTextNode(text + " "));
                if(href != null) {
                    var a = document.createElement("a");
                    a.href = href;
                    a.text = "Подробнее";
                    td1.appendChild(a);
                }
                row.appendChild(td1);
                tbody.appendChild(row);
            }
            else{
                table.deleteRow(1);
            }
        }
    </script>
    <h4 id="we" align="center" style="margin-top: 50px">О нас</h4>
    <p style="text-indent: 3%; text-align: justify">Полевая опытная станция является старейшим  аграрным научно-исследовательским учреждением страны – «колыбелью» отечественной агрономии. Она была основана в 1867 г. на месте бывшего опытного поля Петровской земледельческой и лесной академии. Инициатором ее основания стал один из основоположников научного земледелия и сельскохозяйственного опытного дела в России И.А. Стебут.
    </p>
    <p style="text-indent: 3%; text-align: justify">В 1867 г. был заложен первый шестипольный севооборот, в том же году были заложены первые полевые опыты. В 1869 г. в программу работ были включены и вегетационные опыты. В 1875 г. заведующий кафедрой земледелия А.А. Фадеев и в то время еще молодой преподаватель В.Р. Вильямс начинают изучение разных видов паров, сроков обработки почвы под яровые хлеба и т.д. До 1894 г. опытным полем заведовал И.А. Стебут, а с 1894 г. В.Р. Вильямс.
    </p>
    <p style="text-indent: 3%; text-align: justify">На полевой опытной станции сохранилась старейшая в России теплица в стиле английской готики, построенная под руководством И.А. Стебута и К.А. Тимирязева, использовавшаяся для проведения вегетационных опытов.
    </p>
    <p style="text-indent: 3%; text-align: justify">Бережно сохраняется и продолжается старейший полевой многофакторный опыт нашей страны, заложенный по инициативе Д.Н. Прянишникова в 1912 г. Схема, методика опыта и программа исследований были разработаны инициатором организации с.-х. опытного дела профессором А.Г. Дояренко (с 1907 г. он стал читать первый в России курс по этому предмету). Длительный стационарный многофакторный полевой опыт направлен на разработку и научное обоснование интенсивной аграрно-промышленной системы земледелия и контроля за плодородием почвы. Он посвящен изучению основных проблем полеводства нечерноземной полосы: применению удобрений, севооборота и обработки почвы.
    </p>
    <p style="text-indent: 3%; text-align: justify">В настоящее время станция ведет работу над такими научными задачами как как программирование урожаев агроценозов полевых культур на основе управления продукционным процессом в растениеводстве, разработка инновационных технологий в земледелии на основе глобального позиционирования с учетом биологических особенностей сельскохозяйственных культур, разработка теоретических и практических основ воспроизводства плодородия почв в адаптивно-ландшафтных системах земледелия, селекция новых сортов полевых культур, поддержание биоресурсной коллекции видов, разновидностей и сортов зерновых культур (пшеница, ячмень, овес, тритикале) и многими другими.
    </p>
@endsection

