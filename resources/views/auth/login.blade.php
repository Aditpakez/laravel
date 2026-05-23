<x-authentication>
    <form action="/login" method= "post">
           @csrf

        <input type="text" name="text" placeholder="text"/>
        <input type="name" name="name" placeholder="name"/>
        <input type="email" name="email" placeholder="email"/>
        <input type="password" name="password" placeholder="password">
        <input type="password" name="password_confirmation" placeholder="password">

        <button type="submit">login</button>
    </form>
</x-authentication>