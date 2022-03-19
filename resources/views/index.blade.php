@extends('layouts.master')
@section('css')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
@section('content')

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/p1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Метка первого слайда</h5>
                    <p>Некоторый репрезентативный заполнитель для первого слайда.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/p2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Метка второго слайда</h5>
                    <p>Некоторый репрезентативный заполнитель для второго слайда.</p>
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
    @foreach($events as $event)
        @if($event->visible === 1)
            <div style="background-color: rgba(146,204,128,0.5); border-radius: 5px;">
        <table class="table" id="{{$event->id}}">
            <tbody>
            <tr  class="border-dark">
                <td>{{$event->created_at->format('m/d/Y')}}</td>
                <td>{{$event->created_at->format('H:i:s')}}</td>
                <td align="right"><a style="color: black"  href="javascript://" onclick="addRow('{{$event->id}}','{{$event->description}}');return false;">{{$event->name}}</a></td>
            </tr>
            </tbody>
        </table>
            </div>
        @endif
        @auth
            @if($event->visible === 0)
                <table class="table" id="{{$event->id}}">
                    <tbody>
                    <tr>
                        <td>{{$event->created_at->format('m/d/Y')}}</td>
                        <td>{{$event->created_at->format('H:i:s')}}</td>
                        <td align="right"><a style="color: black"  href="javascript://" onclick="addRow('{{$event->id}}','{{$event->description}}');return false;">{{$event->name}}</a></td>
                    </tr>
                    </tbody>
                </table>
                @endif
            @endauth
    @endforeach
    <script type="text/javascript">
        function addRow(id,text){
            var tbody = document.getElementById(id).getElementsByTagName("tbody")[0];
            var table = document.getElementById(id);
            var tbodyRowCount = table.tBodies[0].rows.length;
            if(tbodyRowCount <= 1){
                var row = document.createElement("tr");
                var td1 = document.createElement("td");
                td1.colSpan = "3";
                td1.appendChild(document.createTextNode(text));
                row.appendChild(td1);
                tbody.appendChild(row);}
            else{
                table.deleteRow(1);
            }
        }
    </script>
    <h4 id="we" align="center" style="margin-top: 50px">О нас</h4>
    <p>Тимирязевская академия (она же РГАУ-МСХА им. Тимирязева), основанная в 1865 году, считается старейшим аграрным университетом России. Она носит имя знаменитого естествоиспытателя Климента Аркадьевича Тимирязева, который занимался исследованиями фотосинтеза и популяризацией науки. Видный ученый, он состоял в Лондонском королевском обществе и был почетным доктором трех зарубежных вузов — Кембриджа, а также университетов Женевы и Глазго. Кроме академии, в честь Тимирязева были названы множество улиц и населенных пунктов в России и странах СНГ, теплоход, научно-исследовательские организации, станция метро в Москве, лунный кратер, премия РАН за работы по физиологии растений и другие материальные и нематериальные объекты.

        Корпуса академии, которую в народе называют «Тимирязевка», расположены на территории усадьбы «Петровское», благоустроенной в конце XVII века семьей Нарышкиных. Англичанин Уильям Кокс, путешествовавший по этой местности в конце XVIII века, сравнивал Петровское имение с целым городом, потому что тогда здесь находилось несколько десятков домов. В то время оно принадлежало князю Кириллу Разумовскому, который любил свои земли и превратил их в загородную резиденцию, ежегодно над их поддержкой в надлежащем состоянии трудились сотни крестьян. В 1861 году государство приобрело владения Разумовского и разместило на них Петровскую земледельческую и лесную академию, это первое название Тимирязевской академии. Над чертежами главного здания вуза и проектами прилегающих к нему территорий трудился знаменитый архитектор Николай Бенуа.</p>
@endsection

