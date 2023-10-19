<form action="{{ route('transactions.destroy', $transaction) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>                    
</form>