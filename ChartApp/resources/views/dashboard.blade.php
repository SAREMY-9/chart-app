<x-app-layout>
    <div class="container py-5">
        <h2 class="mb-4">Expense Tracker</h2>

      
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        
        <form action="{{ route('expenses.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="row g-3">
                <div class="col-md-3">
                    <input type="date" name="date" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="category" class="form-control" placeholder="Category" required>
                </div>
                <div class="col-md-3">
                    <input type="number" name="amount" class="form-control" placeholder="Amount" required step="0.01">
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary w-100">Add Expense</button>
                </div>
            </div>
        </form>


    
    
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
    @foreach ($expenses as $expense)
            <tr id="expense-row-{{ $expense->id }}">
                <td>
                    <span class="view-mode">{{ $expense->date }}</span>
                    <input type="date" class="edit-mode form-control" name="date" value="{{ $expense->date }}" style="display: none;">
                </td>

                <td>
                     <span class="view-mode">{{ $expense->category }}</span>
                    <input type="text" class="edit-mode form-control" name="category" value="{{ $expense->category }}" style="display: none;">
               </td>

               <td>
                   <span class="view-mode">{{ $expense->amount }}</span>
                  <input type="number" step="0.01" class="edit-mode form-control" name="amount" value="{{ $expense->amount }}" style="display: none;">
              </td>

              <td>
           
              <button class="btn btn-sm btn-primary edit-btn">Edit</button>

           
             <form action="{{ route('expenses.update', $expense->id) }}" method="POST" class="edit-form d-inline" style="display: none;">
                @csrf
                @method('PUT') 
                <input type="hidden" name="date">
                <input type="hidden" name="category">
                <input type="hidden" name="amount">
                <button type="submit" class="btn btn-sm btn-success save-btn">Save</button>
             </form>

            
               <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this expense?')">Delete</button>
                </form>
               </td>
            </tr>

    @endforeach

                    @if($expenses->isEmpty())
                        <tr><td colspan="4" class="text-center">No expenses yet.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>


    <script>
          document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function () {
                 const row = this.closest('tr');
                 row.querySelectorAll('.view-mode').forEach(el => el.style.display = 'none');
                 row.querySelectorAll('.edit-mode').forEach(el => el.style.display = 'inline-block');
                 row.querySelector('.edit-form').style.display = 'inline-block';
                 this.style.display = 'none'; // Hide "Edit" button

            
               const form = row.querySelector('.edit-form');
               form.querySelector('input[name="date"]').value = row.querySelector('input[name="date"]').value;
               form.querySelector('input[name="category"]').value = row.querySelector('input[name="category"]').value;
               form.querySelector('input[name="amount"]').value = row.querySelector('input[name="amount"]').value;

      
                 form.addEventListener('submit', function () {
                 form.querySelector('input[name="date"]').value = row.querySelector('input[name="date"]').value;
                 form.querySelector('input[name="category"]').value = row.querySelector('input[name="category"]').value;
                 form.querySelector('input[name="amount"]').value = row.querySelector('input[name="amount"]').value;
             });
          });
       });
    </script>



</x-app-layout>
