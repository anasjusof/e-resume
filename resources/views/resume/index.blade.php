<head>
    <style>
        @page {
            size: A4 potrait;
        }
        
        @media print {
            .section {page-break-after: always;}
        }
    </style>
</head>


<div class="section">
<p><strong>Maklumat Peribadi</strong></p>
<table width="100%" cellspacing="0" cellpadding="4">
    <tbody>
        <tr valign="top">
            <td rowspan="7" width="50%">
                <img height="300px" width="auto" src="{{url('images/'.$user->image)}}"
            </td>
            <td width="50%">
                <p>{{ $user->name }}</p>
            </td>
        </tr>
        <tr valign="top">
            <td width="50%">
                <p>{{ $user->staff_id }}</p>
            </td>
        </tr>
        <tr valign="top">
            <td width="50%">
                <p>{{ $user->jawatan }}</p>
            </td>
        </tr>
        <tr valign="top">
            <td width="50%">
                <p>{{ $user->jabatan }}</p>
            </td>
        </tr>
        <tr valign="top">
            <td width="50%">
                <p>{{ $user->fakulti }}</p>
            </td>
        </tr>
        <tr valign="top">
            <td width="50%">
                <p>{{ $user->email }}</p>
            </td>
        </tr>
        <tr valign="top">
            <td width="50%">
                <p>{{ $user->phone }}</p>
            </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<p><strong>Latar Belakang Pengajian</strong></p>
<table width="100%" cellspacing="0" cellpadding="4">
    <tbody>
        <tr valign="top">
            <td width="25%">
                <p>&nbsp;</p>
            </td>
            <td width="25%">
                <p><u><strong>Institusi</strong></u></p>
            </td>
            <td width="25%">
                <p><u><strong>Tahap Kelulusan</strong></u></p>
            </td>
            <td width="25%">
                <p><u><strong>Nama Kelulusan</strong></u></p>
            </td>
        </tr>
        <?php $count1 = 1; ?>
        @foreach($latar_belakang_pengajians as $latar_belakang_pengajian)
        <tr valign="top">
            <td width="25%">
                <p>{{ $count1 }}</p>
            </td>
            <td width="25%">
                <p>{{ $latar_belakang_pengajian->institusi }}</p>
            </td>
            <td width="25%">
                <p>{{ $latar_belakang_pengajian->tahap_kelulusan }}</p>
            </td>
            <td width="25%">
                <p>{{ $latar_belakang_pengajian->nama_kelulusan }}</p>
            </td>
        </tr>
        <?php $count1++ ?>
        @endforeach
    </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

<div class="section">
<p><strong>Penyeliaan</strong></p>
<table width="100%" cellspacing="0" cellpadding="4">
    <tbody>
        <tr valign="top">
            <td width="17%">
                <p>&nbsp;</p>
            </td>
            <td width="17%">
                <p><u><strong>Nama</strong></u></p>
            </td>
            <td width="17%">
                <p><u><strong>No Matrik</strong></u></p>
            </td>
            <td width="17%">
                <p><u><strong>Tajuk</strong></u></p>
            </td>
            <td width="17%">
                <p><u><strong>Sem</strong></u></p>
            </td>
            <td width="17%">
                <p><u><strong>Status</strong></u></p>
            </td>
        </tr>
        <?php $count2 = 1; ?>
        @foreach($penyeliaans as $penyeliaan)
        <tr valign="top">
            <td width="17%">
                <p>{{ $count2 }}</p>
            </td>
            <td width="17%">
                <p>{{ $penyeliaan->nama }}</p>
            </td>
            <td width="17%">
                <p>{{ $penyeliaan->no_matrik }}</p>
            </td>
            <td width="17%">
                <p>{{ $penyeliaan->tajuk }}</p>
            </td>
            <td width="17%">
                <p>{{ $penyeliaan->sem }}</p>
            </td>
            <td width="17%">
                <p>{{ $penyeliaan->status }}</p>
            </td>
        </tr>
        <?php $count2++ ?>
        @endforeach
    </tbody>
</table>
<p>&nbsp;</p>
<hr>
<p>&nbsp;</p>
<p><strong>Pengajaran</strong></p>
<table width="100%" cellspacing="0" cellpadding="4">
    <tbody>
        <tr valign="top">
            <td width="17%">
                <p>&nbsp;</p>
            </td>
            <td width="17%">
                <p><u><strong>Kod Kursus</strong></u></p>
            </td>
            <td width="17%">
                <p><u><strong>Nama Kursus</strong></u></p>
            </td>
            <td width="17%">
                <p><u><strong>Sem</strong></u></p>
            </td>
            <td width="17%">
                <p><u><strong>Bil. Pelajar</strong></u></p>
            </td>
            <td width="17%">
                <p><u><strong>Tahap</strong></u></p>
            </td>
        </tr>
        <?php $count3 = 1; ?>
        @foreach($pengajarans as $pengajaran)
        <tr valign="top">
            <td width="17%">
                <p>{{ $count3 }}</p>
            </td>
            <td width="17%">
                <p>{{ $pengajaran->kod_kursus }}</p>
            </td>
            <td width="17%">
                <p>{{ $pengajaran->nama_kursus }}</p>
            </td>
            <td width="17%">
                <p>{{ $pengajaran->sem }}</p>
            </td>
            <td width="17%">
                <p>{{ $pengajaran->bil_pelajar }}</p>
            </td>
            <td width="17%">
                <p>{{ $pengajaran->tahap }}</p>
            </td>
        </tr>
        <?php $count3++ ?>
        @endforeach
    </tbody>
</table>
<p>&nbsp;</p>
</div>
</body>

<script>
    window.print();
</script>