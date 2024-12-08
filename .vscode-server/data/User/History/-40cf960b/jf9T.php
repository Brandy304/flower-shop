class FlowerController extends Controller
{
    public function index() {
        // 显示花卉列表
    }

    public function create() {
        // 显示创建花卉的表单
    }

    public function store(Request $request) {
        // 存储新创建的花卉
    }

    public function show($id) {
        // 显示单个花卉的详细信息
    }

    public function edit($id) {
        // 显示编辑花卉的表单
    }

    public function update(Request $request, $id) {
        // 更新花卉信息
    }

    public function destroy($id) {
        // 删除花卉
    }
}
