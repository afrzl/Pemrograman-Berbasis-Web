# SiTilangSTIS

### Deskripsi

Aplikasi yang digunakan untuk membantu dalam memberikan informasi dan pencatatan mengenai adanya pelanggaran yang dilakukan oleh mahasiswa Politeknik Statistika STIS.

### Roles

| Roles       | Deskripsi                                                                                                       |
| ----------- | --------------------------------------------------------------------------------------------------------------- |
| `BAAK`      | User yang berfunsi sebagai administrator dan pemberi keputusan dalam memberikan sanksi poin terhadap mahasiswa. |
| `SPD`       | User yang berfungsi dalam pelaksana dalam mencatat adanya pelanggaran dan diajukan kepada BAAK.                 |
| `Mahasiswa` | User yang diberi pelanggaran.                                                                                   |

### Permissions

| Permission             | Roles         |
| ---------------------- | ------------- |
| `CRUD Pelanggaran`     | `BAAK`, `SPD` |
| `CRUD Point Mahasiswa` | `BAAK`        |
| `CRUD Evaluasi`        | `Mahasiswa`   |

### Views

`Landing Page` : Sebagai halaman awal/dashboard aplikasi.  
`Login Page` : Sebagai halaman untuk masuk ke dalam sistem menurut roles.  
`Admin` : Dibagi menjadi 2, yaitu untuk `BAAK` dan `SPD`.

### Built With

Aplikasi ini dibuat dengan menggunakan teknologi:

![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
