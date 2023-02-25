<?php

class Masyarakat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_masyarakat');
    }

    public function index()
    {
        $data['title'] = 'Login Masyarakat';
        $this->load->view('template/header_auth', $data);
        $this->load->view('masyarakat/login');
        $this->load->view('template/footer_auth');
    }


    public function masyarakat()
    {
        if ($this->session->userdata('login_status') == 'ok') {
            $this->tampilMasyarakat();
        } else {
            $data['title'] = 'Login Masyarakat';
            $this->load->view('template/header_auth', $data);
            $this->load->view('masyarakat/login');
            $this->load->view('template/footer_auth');
        }
    }

    public function tampilMasyarakat()
    {
        $data['pengaduan'] = $this->m_masyarakat->tampilAduan();
        $data['title'] = 'Masyarakat';
        $this->load->view('template/header_m', $data);
        $this->load->view('masyarakat/home', $data);
        $this->load->view('template/footer_m');
    }


    public function registrasi_m()
    {
        $data['title'] = 'Registrasi Masyarakat';
        $this->load->view('template/header_auth', $data);
        $this->load->view('masyarakat/registrasi');
        $this->load->view('template/footer_auth');
    }

    public function registrasi_masyarakat()
    {
        $this->validasi_m();

        if ($this->form_validation->run() == false) {
            $this->registrasi_m();
        } else {
            $pass = md5($_POST['password']);
            $data = array(
                'nik' => $_POST['nik'],
                'nama' => $_POST['nama'],
                'username' => $_POST['username'],
                'password' => $pass,
                'telp' => $_POST['telp']
            );

            if ($this->m_masyarakat->tambah_m($data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Selamat Anda Sudah Mempunyai Akun, Silahkan Login</div>');
                $this->index();
            }
        }
    }

    public function login()
    {
        $this->validasi_login();

        if ($this->form_validation->run() == false) {
            $this->masyarakat();
        } else {
            $pass = md5($_POST['password']);
            $data = array(
                'username' => $_POST['username'],
                'password' => $pass
            );

            $data = $this->m_masyarakat->login($data);

            if (count($data) > 0) {
                $this->session->set_userdata('login_status', 'ok');
                $this->session->set_userdata('nik', $data[0]['nik']);
                $this->session->set_userdata('nama', $data[0]['nama']);
                redirect('Masyarakat/masyarakat');
            } else {
                $this->masyarakat();
            }
        }
    }

    public function form_aduan()
    {
        if ($this->session->userdata('login_status') == 'ok') {
            $this->tampilMasyarakat();
        } else {
            $this->masyarakat();
        }
    }

    public function simpan_aduan()
    {
        $this->form_validation->set_rules('isi_laporan', 'Isi Laporan', 'required');

        if ($this->form_validation->run() == false) {
            $this->form_aduan();
        } else {

            $config['upload_path'] = './assets/img_laporan';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
                $data['title'] = 'Masyarakat';
                $this->load->view('template/header_m', $data);
                $this->load->view('masyarakat/home', $error);
                $this->load->view('template/footer_m');
            } else {
                $data = $this->upload->data();
                $filename = $data['file_name'];

                $data = array(
                    'tgl_pengaduan' => date('Y-m-d'),
                    'nik'               => $this->session->userdata['nik'],
                    'isi_laporan'       => $_POST['isi_laporan'],
                    'foto'              => $filename
                );

                if ($this->m_masyarakat->tambahAduan($data)) {

                    redirect('Masyarakat/tampilMasyarakat', 'refresh');
                } else {
                    $error = array('error' => 'Gagal Simpan Data');
                    $data['title'] = 'Masyarakat';
                    $this->load->view('template/header_m', $data);
                    $this->load->view('masyarakat/home', $error);
                    $this->load->view('template/footer_m');
                }
            }
        }
    }

    public function tanggapan($id)
    {
        $data['detailaduan'] = $this->m_masyarakat->tampilAduan2($id);
        $data['aduantanggapan'] = $this->m_masyarakat->tampilAduanTanggapan($id);
        $this->load->view('template/header_auth');
        $this->load->view('masyarakat/tampil_tanggapan', $data);
        $this->load->view('template/footer_auth');
    }


    public function validasi_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }

    public function validasi_m()
    {
        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('telp', 'No Hp', 'required');
    }

    public function logout()
    {
        unset(
            $_SESSION['login_status'],
            $_SESSION['nik'],
            $_SESSION['nama']
        );

        $this->index();
    }
}
