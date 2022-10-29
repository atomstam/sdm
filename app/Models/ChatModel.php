<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model
{
    protected $table = 'chat';
    protected $primaryKey = 'id';
    protected $allowedFields = [  'chat_area', 'chat_code', 'chat_msg', 'chat_user1', 'user1_name', 'chat_user2', 'user2_name', 'ip', 'chat_datetime'];



}
