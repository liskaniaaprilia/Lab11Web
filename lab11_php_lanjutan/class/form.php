<?php

class FormLibrary
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function fetchData()
    {
        $sql = 'SELECT * FROM data_barang';
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function generateTable($result)
    {
        $tableHTML = '<table>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>';

        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                $tableHTML .= '<tr>
                                <td><img src="gambar/' . $row['gambar'] . '" alt="' . $row['nama'] . '"></td>
                                <td>' . $row['nama'] . '</td>
                                <td>' . $row['kategori'] . '</td>
                                <td>' . $row['harga_beli'] . '</td>
                                <td>' . $row['harga_jual'] . '</td>
                                <td>' . $row['stok'] . '</td>
                                <td>
                                    <a href="ubah.php?id=' . $row['id_barang'] . '">Ubah</a>
                                    <a href="hapus.php?id=' . $row['id_barang'] . '">Hapus</a>
                                </td>
                            </tr>';
            }
        } else {
            $tableHTML .= '<tr>
                            <td colspan="7">Belum ada data</td>
                        </tr>';
        }

        $tableHTML .= '</table>';

        return $tableHTML;
    }
}

?>
