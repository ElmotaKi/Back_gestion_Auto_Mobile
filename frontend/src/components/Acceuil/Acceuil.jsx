import Dashboard from "../Dashboard/Dashboard"
import AdminCards from "../Dashboard/Admin/AdminCards"
import CustomAvatar from "../Dashboard/CustomAvatar"

function Acceuil() {
  return (
    <div className="flex ...">
        <div className="flex-none w-14 h-14">
            <Dashboard/>
        </div>
        <div className="grow h-14 mt-20 ">
            <AdminCards/>
        </div>
        <div className="flex-none w-14 h-14 my-2">
            <CustomAvatar/>
        </div>
        </div>
  )
}

export default Acceuil
