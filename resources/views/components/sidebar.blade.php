<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="sidebar">
    <a class="panelHeader">Panel</a>
    <a  href="{{url('/panel/users')}}">Users</a>
    <a href="{{url('/panel/products')}}">Products</a>
    <a href="{{url('/panel/orders')}}">Orders</a>
    <a href="{{url('/panel/options')}}">options</a>
</div>

</body>
<script type="application/javascript">
    $('.sidebar a').click(function () {
        $('.sidebar a.active').removeClass('active');
        $(this).find("a").addClass('active');
    });
</script>
</html>
