<h2 class="sub-header" >Все объявления</h2>
    <div class="table-responsive" style="height: 600px; overflow:auto; ">
        <table id="main" class="table">
           <thead>
                <tr>
                    <th>Дата публикации</th>
                    <th>Название</th>
                    <th></th>
                    <th>Цена</th>
                    <th>Имя автора</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tbody" >
                @include('site/table_row')
            </tbody>
        </table>
    </div>