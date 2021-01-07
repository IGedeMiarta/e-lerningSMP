<?php


function is_admin()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        if ($role_id != 1) {
            redirect('Eror');
        }
    }
}

function is_teacher()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        if ($role_id != 2) {
            redirect('Eror');
        }
    }
}

function is_student()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        if ($role_id != 3) {
            redirect('Eror');
        }
    }
}

function is_user()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
    }
}

function is_logged_in()
{
    $ci = get_instance();
    if ($ci->session->userdata('email')) {
        redirect('user');
    }
}

function check_mapel($no_regis1, $id)
{
    $ci = get_instance();
    $no_regis = decrypt_url($no_regis1);

    $ci->db->where('no_regis', $no_regis);
    $ci->db->where('mapel_id', $id);
    $result = $ci->db->get('guru-mapel');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function check_kelas($no_regis1, $id)
{
    $ci = get_instance();
    $no_regis = decrypt_url($no_regis1);

    $ci->db->where('no_regis', $no_regis);
    $ci->db->where('kelas_id', $id);
    $result = $ci->db->get('guru-kelas');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
