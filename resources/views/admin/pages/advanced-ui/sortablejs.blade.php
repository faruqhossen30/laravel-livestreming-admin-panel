@extends('admin.layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Advanced UI</a></li>
    <li class="breadcrumb-item active" aria-current="page">SortableJs</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">SortableJs</h4>
        <p class="text-muted">Reorderable drag-and-drop lists for modern browsers and touch devices. Read the <a href="https://sortablejs.github.io/Sortable/" target="_blank"> Official SortableJs Documentation </a>for a full list of instructions and other options.</p>                  
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title mb-3">Simple list</h6>
        <ul class="list-group" id="simple-list">
          <li class="list-group-item">item 1</li>
          <li class="list-group-item">item 2</li>
          <li class="list-group-item">item 3</li>
          <li class="list-group-item">item 4</li>
          <li class="list-group-item">item 5</li>
          <li class="list-group-item">item 6</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title mb-3">Handle</h6>
        <ul class="list-group" id="handle-example">
          <li class="list-group-item"> <i data-feather="move" class="icon-sm handle me-2"></i> item 1</li>
          <li class="list-group-item"> <i data-feather="move" class="icon-sm handle me-2"></i> item 2</li>
          <li class="list-group-item"> <i data-feather="move" class="icon-sm handle me-2"></i> item 3</li>
          <li class="list-group-item"> <i data-feather="move" class="icon-sm handle me-2"></i> item 4</li>
          <li class="list-group-item"> <i data-feather="move" class="icon-sm handle me-2"></i> item 5</li>
          <li class="list-group-item"> <i data-feather="move" class="icon-sm handle me-2"></i> item 6</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title mb-3">Shared lists</h6>
        <p class="text-muted mb-3">Try dragging from one list to another.</p>
        <div class="row">
          <div class="col">
            <ul class="list-group" id="shared-list-left">
              <li class="list-group-item list-group-item-primary">item 1</li>
              <li class="list-group-item list-group-item-primary">item 2</li>
              <li class="list-group-item list-group-item-primary">item 3</li>
              <li class="list-group-item list-group-item-primary">item 4</li>
              <li class="list-group-item list-group-item-primary">item 5</li>
              <li class="list-group-item list-group-item-primary">item 6</li>
            </ul>
          </div>
          <div class="col">
            <ul class="list-group" id="shared-list-right">
              <li class="list-group-item list-group-item-info">item 1</li>
              <li class="list-group-item list-group-item-info">item 2</li>
              <li class="list-group-item list-group-item-info">item 3</li>
              <li class="list-group-item list-group-item-info">item 4</li>
              <li class="list-group-item list-group-item-info">item 5</li>
              <li class="list-group-item list-group-item-info">item 6</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title mb-3">Cloning</h6>
        <p class="text-muted mb-3">Try dragging from one list to another. The item you drag will be cloned and the clone will stay in the original list.</p>
        <div class="row">
          <div class="col">
            <ul class="list-group" id="shared-list-2-left">
              <li class="list-group-item list-group-item-primary">item 1</li>
              <li class="list-group-item list-group-item-primary">item 2</li>
              <li class="list-group-item list-group-item-primary">item 3</li>
              <li class="list-group-item list-group-item-primary">item 4</li>
              <li class="list-group-item list-group-item-primary">item 5</li>
              <li class="list-group-item list-group-item-primary">item 6</li>
            </ul>
          </div>
          <div class="col">
            <ul class="list-group" id="shared-list-2-right">
              <li class="list-group-item list-group-item-info">item 1</li>
              <li class="list-group-item list-group-item-info">item 2</li>
              <li class="list-group-item list-group-item-info">item 3</li>
              <li class="list-group-item list-group-item-info">item 4</li>
              <li class="list-group-item list-group-item-info">item 5</li>
              <li class="list-group-item list-group-item-info">item 6</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title mb-3">Disabling sorting</h6>
        <p class="text-muted mb-3">Try sorting the list on the left. It is not possible because it has it's sort option set to false. However, you can still drag from the list on the left to the list on the right.</p>
        <div class="row">
          <div class="col">
            <ul class="list-group" id="shared-list-3-left">
              <li class="list-group-item list-group-item-primary">item 1</li>
              <li class="list-group-item list-group-item-primary">item 2</li>
              <li class="list-group-item list-group-item-primary">item 3</li>
              <li class="list-group-item list-group-item-primary">item 4</li>
              <li class="list-group-item list-group-item-primary">item 5</li>
              <li class="list-group-item list-group-item-primary">item 6</li>
            </ul>
          </div>
          <div class="col">
            <ul class="list-group" id="shared-list-3-right">
              <li class="list-group-item list-group-item-info">item 1</li>
              <li class="list-group-item list-group-item-info">item 2</li>
              <li class="list-group-item list-group-item-info">item 3</li>
              <li class="list-group-item list-group-item-info">item 4</li>
              <li class="list-group-item list-group-item-info">item 5</li>
              <li class="list-group-item list-group-item-info">item 6</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title mb-3">Filter</h6>
        <p class="text-muted mb-3">Try dragging the item with a red background. It cannot be done, because that item is filtered out using the filter option.</p>
        <ul class="list-group" id="filter-example">
          <li class="list-group-item">item 1</li>
          <li class="list-group-item">item 2</li>
          <li class="list-group-item list-group-item-danger filtered">item 3</li>
          <li class="list-group-item">item 4</li>
          <li class="list-group-item">item 5</li>
          <li class="list-group-item">item 6</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title mb-3">Grid example</h6>
        <div class="d-flex gap-3 flex-wrap" id="grid-example">
          <div class="wd-100 ht-100 rounded bg-secondary text-white d-flex align-items-center justify-content-center">
            item 1
          </div>
          <div class="wd-100 ht-100 rounded bg-secondary text-white d-flex align-items-center justify-content-center">
            item 2
          </div>
          <div class="wd-100 ht-100 rounded bg-secondary text-white d-flex align-items-center justify-content-center">
            item 3
          </div>
          <div class="wd-100 ht-100 rounded bg-secondary text-white d-flex align-items-center justify-content-center">
            item 4
          </div>
          <div class="wd-100 ht-100 rounded bg-secondary text-white d-flex align-items-center justify-content-center">
            item 5
          </div>
          <div class="wd-100 ht-100 rounded bg-secondary text-white d-flex align-items-center justify-content-center">
            item 6
          </div>
          <div class="wd-100 ht-100 rounded bg-secondary text-white d-flex align-items-center justify-content-center">
            item 7
          </div>
          <div class="wd-100 ht-100 rounded bg-secondary text-white d-flex align-items-center justify-content-center">
            item 8
          </div>
          <div class="wd-100 ht-100 rounded bg-secondary text-white d-flex align-items-center justify-content-center">
            item 9
          </div>
          <div class="wd-100 ht-100 rounded bg-secondary text-white d-flex align-items-center justify-content-center">
            item 10
          </div>
          <div class="wd-100 ht-100 rounded bg-secondary text-white d-flex align-items-center justify-content-center">
            item 11
          </div>
          <div class="wd-100 ht-100 rounded bg-secondary text-white d-flex align-items-center justify-content-center">
            item 12
          </div>
          <div class="wd-100 ht-100 rounded bg-secondary text-white d-flex align-items-center justify-content-center">
            item 13
          </div>
          <div class="wd-100 ht-100 rounded bg-secondary text-white d-flex align-items-center justify-content-center">
            item 14
          </div>
          <div class="wd-100 ht-100 rounded bg-secondary text-white d-flex align-items-center justify-content-center">
            item 15
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title mb-3">Nested sortables</h6>
        <p class="text-muted mb-3">NOTE: When using nested Sortables with animation, it is recommended that the <code>fallbackOnBody</code> option is set to true. <br>It is also always recommended that either the <code>invertSwap</code> option is set to true, or the <code>swapThreshold</code> option is lower than the default value of 1 (eg <code>0.65</code>).</p>
        <div id="nested-sortable" class="nested-sortable">
          <div class="p-3 border rounded bg-gray-600 mt-2">
            item 1.1
            <div class="nested-sortable">
              <div class="p-3 border rounded bg-gray-400 mt-2">
                item 2.1
              </div>
              <div class="p-3 border rounded bg-gray-400 mt-2">
                item 2.2
                <div class="nested-sortable">
                  <div class="p-3 border rounded bg-gray-500 mt-2">
                    item 3.1
                  </div>
                  <div class="p-3 border rounded bg-gray-500 mt-2">
                    item 3.2
                  </div>
                  <div class="p-3 border rounded bg-gray-500 mt-2">
                    item 3.3
                  </div>
                  <div class="p-3 border rounded bg-gray-500 mt-2">
                    item 3.4
                  </div>
                </div>
              </div>
              <div class="p-3 border rounded bg-gray-400 mt-2">
                item 2.3
              </div>
              <div class="p-3 border rounded bg-gray-400 mt-2">
                item 2.4
              </div>
            </div>
          </div>
          <div class="p-3 border rounded bg-gray-600 mt-2">
            item 1.2
          </div>
          <div class="p-3 border rounded bg-gray-600 mt-2">
            item 1.3
          </div>
          <div class="p-3 border rounded bg-gray-600 mt-2">
            item 1.4
            <div class="nested-sortable">
              <div class="p-3 border rounded bg-gray-400 mt-2">
                item 2.1
              </div>
              <div class="p-3 border rounded bg-gray-400 mt-2">
                item 2.2
              </div>
              <div class="p-3 border rounded bg-gray-400 mt-2">
                item 2.3
              </div>
              <div class="p-3 border rounded bg-gray-400 mt-2">
                item 2.4
              </div>
            </div>
          </div>
          <div class="p-3 border rounded bg-gray-600 mt-2">
            item 1.5
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('admin/assets/plugins/sortablejs/Sortable.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('admin/assets/js/sortablejs.js') }}"></script>
@endpush