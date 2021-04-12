<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>NGAN HANG CAU HOI</h2>

<table>
  <?php 
                              $stt= 1;
                               foreach($cauhoi as $ch ):$stt ?>
                    <tr>
                      <td>{{ $stt++ }}</td>
                           
                            <td>{!! $ch->noidung !!}</td>
                            <td>{!! $ch->a !!}</td>
                            <td>{!! $ch->b !!}</td>
                            <td>{!! $ch->c !!}</td>
                            <td>{!! $ch->d !!}</td>
                    </tr>
                    <?php endforeach ?>

</table>

</body>
</html>
