<table width="99%" align="center">
    <tr>
        <td rowspan="3">
            <img src="{{asset('img/books-42701_640.png')}}" width="100px" />
        </td>
        <td align="center"><h4> KARTU PERPUSTAKAAN </h4></td>
    </tr>
    <tr>
       
        <td align="center"><h3><b> PERPUSTAKAAN UMUM </b></h3></td>
    </tr>
    <tr>
       
        <td align="center"> Jl. Jalan-Jalan No.2298 Telp.123XXX </td>
    </tr>
    <tr>
        <td colspan="2"> <hr> </td>
    </tr>
</table>
<table width="99%" align="center">
    <tr>
        <td width="25%" rowspan="4">
            <img src="{{ asset($member->foto) }}" width="150" >
        </td>
        <td width="10%"> Nomor </td>
        <td> : {{ $member->nomor }}</td>
    </tr>
    <tr>
        <td width="10%"> Nama </td>
        <td> : {{ $member->nama }}</td>
    </tr>
    <tr>
        <td width="10%"> Alamat </td>
        <td> : {{ $member->address }}</td>
    </tr>
     <tr>
        <td width="10%"> Masa Berlaku </td>
        <td> : {{ $member->expired }}</td>
    </tr>
</table>