import { Route, Routes } from 'react-router-dom';
import Login from './../components/Auth/Login';
import Layout from './../components/Dashboard/Admin/Layout';
import AdminCards from './../components/Dashboard/Admin/AdminCards';
import ListVehicule from './../components/Dashboard/Admin/Vehicule/ListVehicule';
import ListParking from './../components/Dashboard/Admin/Parking/ListParking';
import ListAgent from './../components/Dashboard/Admin/Agent/ListAgent';
import ListCommercial from './../components/Dashboard/Admin/Commercial/ListCommercial';
import ListSociete from './../components/Dashboard/Admin/Societe/ListSociete';
import ListClientsParticuliere from './../components/Dashboard/Admin/ClientsParticuliere/ListClientsParticuliere';
import ListContrat from './../components/Dashboard/Admin/Contrat/ListContrat';
import NotFound from './../components/pages/NotFound';

const AppRoutes = () => {
  
  return (
    <Routes>
      <Route exact path="/" element={<Login />} />
      <Route element={<Layout/>}>
        <Route path="/Acceuil" element={<AdminCards/>} />
        <Route path="/vehicules" element={<ListVehicule />} />
        <Route path="/parkings" element={<ListParking />} />
        <Route path="/agents" element={<ListAgent />} />
        <Route path="/commercials" element={<ListCommercial />} />
        <Route path="/societes" element={<ListSociete />} />
        <Route path="/clients" element={<ListClientsParticuliere />} />
        <Route path="/contrat" element={<ListContrat />} />
      </Route>
      <Route path="*" element={<NotFound />} />
    </Routes>
  );
};

export default AppRoutes;
