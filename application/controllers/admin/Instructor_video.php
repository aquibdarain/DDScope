<?php
class Instructor_video extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Instructor_video_model');
        $this->load->library('upload');
        $this->load->library('email');
        date_default_timezone_set("Asia/Calcutta");
    }

    public function upload_video()
    {
        // $this->security->get_csrf_hash();  // Regenerate CSRF token if needed
        $this->load->view('admin/instructor_video_upload_view');
    }


     public function save_video()
{
    $config['upload_path'] = './uploads/instructors_video/';
    $config['allowed_types'] = 'mp4|avi|mov|wmv';
    $config['max_size'] = 1051648;  // Max file size

    $this->upload->initialize($config);

    if (!$this->upload->do_upload('vidnum')) {
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('admin/instructor_video_upload_view', $error);
        return;
    }

    $videoData = $this->upload->data();
    if (!is_array($videoData)) {
        $error = array('error' => 'Unexpected error occurred while uploading the video.');
        $this->load->view('admin/instructor_video_upload_view', $error);
        return;
    }

    // Collect form data
    $videoDataToInsert = array(
        'caption' => $this->input->post('caption'),
        'vidnum' => $videoData['file_name'],
        'duration' => $this->input->post('duration')  // New duration field
    );

    // Insert video data into the database
    $this->Instructor_video_model->insert_video($videoDataToInsert);

    // Send email notification
    $videoCaption = $this->input->post('caption');
    $videoUrl = base_url('uploads/instructors_video/' . $videoData['file_name']);

    if ($this->sendUploadNotificationEmail([
            'abhayzingare2019@gmail.com', 
            'abhayzingrea@gmail.com',
            'laxmi.singh@dozendiamonds.com',
            'neerajsakharkar@gmail.com',
            'nikhil@dozendiamonds.com',
            'pachbhaitarun74@gmail.com',
            'abhinav.panchal@dozendiamonds.com',
            'abhishek.singh@dozendiamonds.com',
            'nishant.upadhyay@dozendiamonds.com',
            'vinay.patri@dozendiamonds.com',
            'kulwant.kumar@dozendiamonds.com',
            'guptarichard7@gmail.com',
            'sunil.gosai@dozendiamonds.com',
            'prateek.aggarwal@dozendiamonds.com',
            'richa.gupta@dozendiamonds.com'], $videoCaption, $videoUrl)) {
            log_message('info', 'Email sent successfully.');
        } else {
            log_message('error', 'Email sending failed.');
        }

    $this->session->set_flashdata('success', 'Video uploaded successfully!');
    redirect('admin/Instructor_video/upload_video');
}


    private function sendUploadNotificationEmail($email, $videoName, $videoUrl)
    {
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.smtp2go.com';
        $config['smtp_port'] = 587;
        $config['smtp_user'] = 'virtualglobetechnology.com';
        $config['smtp_pass'] = 'Fdtbbwnj2bh29s9U';
        $config['smtp_crypto'] = 'tls';
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";

        $this->email->initialize($config);

        $this->email->from('DozenDiamond@virtualglobetechnology.com', 'Dozen Diamonds');
        $this->email->to($email);
        $this->email->subject('New Video Uploaded: Check it Out!');

        $message = "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                color: #333;
                background-color: #f9f9f9;
                margin: 0;
                padding: 20px;
            }
            .container {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 600px;
                margin: auto;
            }
            h1 {
                color: #4CAF50;
            }
            .button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: #ffffff;
                text-decoration: none;
                border-radius: 5px;
                margin-top: 20px;
            }
            .footer {
                text-align: center;
                margin-top: 30px;
                font-size: 12px;
                color: #999;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>A New Video Has Been Uploaded!</h1>
            <p>Hello,</p>
            <p>We are excited to let you know that a new video titled <strong>{$videoName}</strong> has been uploaded to our site.<a href='http://dozendiamonds.com/' style='color: #4CAF50; text-decoration: none;'>Click here</a> to go to the site.</p>

            <p>We hope you enjoy the content and find it valuable. Click the button below to check it out:</p>
            <a href=https://dozendiamonds.com/home/instructors_videos class='button'>Watch Now</a>
            
            <p>If you have any questions or need assistance, feel free to reply to this email, and our team will be happy to assist you.</p>
            
            <p>Best Regards,<br>
            <strong>The Dozen Diamonds Team</strong></p>
        </div>
        <div class='footer'>
            © 2024 Dozen Diamonds. All rights reserved.<br>
        </div>
    </body>
    </html>
    ";

        // Send the Email
        $this->email->message($message);
        return $this->email->send();
    }
}
