<?php

class Petugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_petugas');
    }

    public function index()
    {
        if ($this->session->userdata('login_petugas_status') == 'ok') {
            redirect('petugas/home');
        } else {
            $data['title'] = 'Petugas';
            $this->load->view('template/header_auth', $data);
            $this->load->view('petugas/login');
            $this->load->view('template/footer_auth');
        }
    }

    public function home()
    {
        if ($this->session->userdata('login_petugas_status') == 'ok') {
            $data['title'] = 'Petugas';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('petugas/home');
            $this->load->view('template/footer');
        } else {
            $data['title'] = 'Petugas';
            $this->load->view('template/header_auth', $data);
            $this->load->view('petugas/login');
            $this->load->view('template/footer_auth');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Petugas';
            $this->load->view('template/header_auth', $data);
            $this->load->view('petugas/login');
            $this->load->view('template/footer_auth');
        } else {
            $pass = md5($this->input->post('password'));
            $data = array(
                'username'  => $this->input->post('username'),
                'password'  => $pass
            );
            $data_login = $this->m_petugas->login($data);

            if (count($data_login) > 0) {
                //data login ada
                $this->session->set_userdata('login_petugas_status', 'ok');
                $this->session->set_userdata('id_petugas', $data_login[0]['id_petugas']);
                $this->session->set_userdata('nama_petugas', $data_login[0]['nama_petugas']);
                $this->session->set_userdata('level', $data_login[0]['level']);
                redirect('petugas/index');
            } else {
                //data login gak ada, kemungkinan salah username atau password
                $data['error'] = array('error' => 'Username atau Password Salah');
                $data['title'] = 'Petugas';
                $this->load->view('template/header_auth', $data);
                $this->load->view('petugas/login', $data);
                $this->load->view('template/footer_auth');
            }
        }
    }

    public function lap_masuk()
    {
        if ($this->session->userdata('login_petugas_status') == 'ok') {
            $data['pengaduan'] = $this->m_petugas->tampilPengaduan();
            $data['title'] = 'Laporan Masuk';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('petugas/lap_masuk', $data);
            $this->load->view('template/footer');
        } else {
            $data['title'] = 'Petugas';
            $this->load->view('template/header_auth', $data);
            $this->load->view('petugas/login');
            $this->load->view('template/footer_auth');
        }
    }

    public function detailaduan($id)
    {
        $data['title'] = 'Detail Aduan';
        $data['detailaduan'] = $this->m_petugas->tampilDetailAduan($id);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('petugas/detail_aduan', $data);
        $this->load->view('template/footer');
    }

    public function ubahstatus($id)
    {
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('petugas/detail_aduan');
            $this->load->view('template/footer');
        } else {
            $data = array(

                'status'              => $this->input->post('status')
            );

            if ($this->m_petugas->ubahStatusAduan($id, $data)) {
                redirect('petugas/lap_masuk');
            } else {
                echo "Gagal Ubah Status";
            }
        }
    }

    public function tanggapan($id)
    {
        $data['title'] = 'Tanggapan';
        $data['detailaduan'] = $this->m_petugas->tampilDetailAduan($id);
        $data['aduantanggapan'] = $this->m_petugas->tampilAduanTanggapan($id);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('petugas/tanggapan', $data,);
        $this->load->view('template/footer');
    }

    public function tambahtanggapan($id)
    {
        $this->form_validation->set_rules('tanggapan', 'Tanggapan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tanggapan';
            $data['detailaduan'] = $this->m_petugas->tampilDetailAduan($id);
            $data['aduantanggapan'] = $this->m_petugas->tampilAduanTanggapan($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('petugas/tanggapan', $data);
            $this->load->view('template/footer');
        } else {
            $data = array(
                'tgl_tanggapan' => date('Y-m-d'),
                'id_pengaduan'  => $id,
                'tanggapan'     => $this->input->post('tanggapan'),
                'id_petugas'    => $this->session->id_petugas
            );
            if ($this->m_petugas->tambahTanggapan($data)) {
                redirect('petugas/tanggapan/' . $id);
            }
        }
    }

    public function tambah_p()
    {
        $data['petugas'] = $this->m_petugas->tampil_petugas();
        $data['title'] = 'Tambah Petugas';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('petugas/tambah_petugas', $data);
        $this->load->view('template/footer');
    }

    public function registrasi_petugas()
    {
        $this->form_validation->set_rules('nama_petugas', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('telp', 'Telepon', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->tambah_p();
        } else {
            $data = array(
                'nama_petugas' => $this->input->post('nama_petugas'),
                'username' => $this->input->post('username'),
                'telp' => $this->input->post('telp'),
                'password' => md5($this->input->post('password')),
                'level' => 'petugas'
            );

            if ($this->m_petugas->tambah_petugas($data)) {
                redirect('petugas/tambah_p');
            } else {
                echo 'Gagal Tambah Data';
            }
        }
    }

    public function print_proses()
    {
        $data['title'] = 'Proses';
        $data['print_proses'] = $this->m_petugas->tampil_proses();
        $this->load->view('petugas/laporan_proses', $data);
    }
    public function print_selesai()
    {
        $data['title'] = 'Selesai';
        $data['print_selesai'] = $this->m_petugas->tampil_selesai();
        $this->load->view('petugas/laporan_selesai', $data);
    }




    public function logout()
    {
        unset(
            $_SESSION['login_petugas_status'],
            $_SESSION['id_petugas'],
            $_SESSION['nama_petugas'],
            $_SESSION['level']
        );
        redirect('petugas/index');
    }
}
