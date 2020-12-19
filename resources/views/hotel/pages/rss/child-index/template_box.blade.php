<script id="template-box-gold" type="x-tmpl-mustache">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th><b>Loại vàng</b></th>
                <th><b>Mua vào</b></th>
                <th><b>Bán ra</b></th>
            </tr>
        </thead>
        <tbody>
            @{{#items}}
                <tr>
                    <td>@{{type}}</td>
                    <td>@{{buy}}</td>
                    <td>@{{sell}}</td>
                </tr>
            @{{/items}}
        </tbody>
    </table>
</script>
