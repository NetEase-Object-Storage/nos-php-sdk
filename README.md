Netease Object Storage(NOS) PHP SDK
- V1.0.0
提供以下接口：
(1)桶操作接口
	createBucket ------ 新建桶
	deleteBucket ------ 删除桶
	doesBucketExist ------ 判断桶是否存在
	putBucketAcl ------ 设置桶的acl
	getBucketAcl ------ 获取桶的acl
	listBuckets ------ 列举当前用户所有的桶
	getBucketLocation ------ 获取桶的location
(2)对象操作接口
	putObject ------ 上传字符串对象
	uploadFile ------ 上传文件
	doesObjectExist ------ 判断对象是否存在
	GetObjectMeta ------ 获取对象元信息
	copyObject ------ 复制对象
	moveObject ------ 移动对象
	deleteObject ------ 删除对象
	deleteObjects ------ 批量删除对象
	getObject ------ 获取对象
(3)大对象分块操作接口
	initiateMultipartUpload ------ 初始化分块上传
	generateMultiuploadParts ------ 生成上传分块列表
	uploadPart ------ 上传分块
	completeMultipartUpload ------ 完成分块上传
	listParts ------ 列出正在上传的分块
	abortMultipartUpload ------ 异常结束分块上传
	listMultipartUploads ------ 列出正在进行的分块上传任务
	multiuploadFile ------ 使用分块上传一个大文件
(4)签名URL生成
	signUrl ------ 生成签名url
