<?php
header('content-type:text/html;charset=utr-8');
/**
 * 构建上传文件信息
 * @return unknown
 */
//检查是单文件上传还是多个单文件上传还是单个多文件上传
function getFiles() {
	$i = 0;
	foreach ($_FILES as $file) {
		if (is_string($file['name'])) {
			$files[$i] = $file;
			$i++;
		} elseif (is_array($file['name'])) {
			foreach ($file['name'] as $key => $val) {
				$files[$i]['name'] = $file['name'][$key];
				$files[$i]['type'] = $file['type'][$key];
				$files[$i]['tmp_name'] = $file['tmp_name'][$key];
				$files[$i]['error'] = $file['error'][$key];
				$files[$i]['size'] = $file['size'][$key];
				$i++;
			}
		}
	}
	return $files;

}

/**
 * 针对于单文件、多个单文件、多文件的上传
 * @param array $fileInfo
 * @param string $path
 * @param string $flag
 * @param number $maxSize
 * @param array $allowExt
 * @return string
 */
function uploadFile($fileInfo, $path = './uploads', $flag = true, $maxSize = 1048576, $allowExt = array('jpeg','jpg','png','gif')) {

	//判断错误号
	if ($fileInfo['error'] === UPLOAD_ERR_OK) {
		//检测上传得到小
		if ($fileInfo['size'] > $maxSize) {
			echo $fileInfo['name'] . '上传文件过大';
		}
		//获取文件扩展名
		$ext = strtolower(end(explode('.', $fileInfo['name'])));
		//检测上传文件的文件类型
		if (!in_array($ext, $allowExt)) {
			echo $fileInfo['name'] . '非法文件类型';
		}
		//检测是否是真实的图片类型
		if ($flag) {
			if (!getimagesize($fileInfo['tmp_name'])) {
				echo $fileInfo['name'] . '不是真实图片类型';
			}
		}
		//检测文件是否是通过HTTP POST上传上来的
		if (!is_uploaded_file($fileInfo['tmp_name'])) {
			echo $fileInfo['name'] . '文件不是通过HTTP POST方式上传上来的';
		}
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
			chmod($path, 0777);
		}
		/*$uniName=getUniName();*/
		//是上传到文件夹的文件名称不乱码
		$fileInfo['name'] = iconv('utf-8', 'gb2312', $fileInfo['name']);
		$destination = $path . '/' . $fileInfo['name'];
		if (!move_uploaded_file($fileInfo['tmp_name'], $destination)) {
			echo $fileInfo['name'] . '文件移动失败';
		}
		$fileInfo_name = iconv('gb2312', 'utf-8', $fileInfo['name']);
		echo "
						<tr>
							<td align='right' width='5%'>" . $fileInfo_name . "上传成功！</td>
							<td width='16%' class='aa'></td>
						</tr>";
		$fileInfo_name . '上传成功<br/>';

		/*$res['dest']=$destination;*/
		return;
	} else {
		//匹配错误信息
		switch ($fileInfo ['error']) {
			case 1 :
				echo '上传文件超过了PHP配置文件中upload_max_filesize选项的值';
				break;
			case 2 :
				echo '超过了表单MAX_FILE_SIZE限制的大小';
				break;
			case 3 :
				echo '文件部分被上传';
				break;
			case 4 :
				echo '没有选择上传文件';
				break;
			case 6 :
				echo '没有找到临时目录';
				break;
			case 7 :
			case 8 :
				echo '系统错误';
				break;
		}
		return;
	}
}
?>