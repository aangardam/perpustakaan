<table width="70%" border="1">
    <tr>
        <td>
           <table width="100%" border="0" cellpadding="0" >
            <tr>
                <td align="center"><font size="+1"> KARTU PERPUSTAKAAN </font></td>
            </tr>
            <tr>
                <td align="center"><b><font size="+2"> PERPUSTAKAAN UMUM </font></b></td>
            </tr>
            <tr>
                <td align="center"> Jl. Jalan-Jalan No.2298 Telp.123XXX </td>
            </tr>
            <tr>
                <td colspan="2"> <hr> </td>
            </tr>
        </table>
        <table width="100%" align="center">
            <tr>
                <td width="20%" rowspan="4">
                    <!-- <img src="{{ asset($member->foto) }}" width="150" > -->
                </td>
                <td width="15%"> Nomor </td>
                <td> : {{ $member->nomor }}</td>
            </tr>
            <tr>
                <td width="15%"> Nama </td>
                <td> : {{ $member->nama }}</td>
            </tr>
            <tr>
                <td width="15%"> Alamat </td>
                <td> : {{ $member->address }}</td>
            </tr>
            <tr>
                <td width="15%"> Masa Berlaku </td>
                <td> : {{ $member->expired }}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
            </tr>
        </table>
    </td>
</tr>
</table>